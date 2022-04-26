<?php

namespace App\Console\Commands;

use DB;
use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Symfony\Component\Console\Formatter\OutputFormatterStyle;

class UpgradeDBCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'azw:upgrade-db
                            {--dry-run : Check which control would be executed and prints the result}
                            {--exec-only= : Comma divided numeric indexes for the scripts to force execute ($skipMe variabile WILL BE honored)}
                            ';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Align the DB to the newest version';

    protected $dryRun;

    protected $execOnly;

    protected $noInteractions;

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //First things first, load the command line variables
        $this->setOptions();
        $this->addWarningStyle();

        if (! $this->noInteractions) {
            $confirmString = 'This procedure MUST be launched by someone that KNOWS EXACTLY what he\'s doing, are you SURE you want to continue?';
            if (! $this->confirm($confirmString)) {
                exit();
            }
        }

        $upgrades = $this->loadDBUpgradeClasses();
        $total = count($upgrades);
        foreach ($upgrades as $key => $upgrade) {
            if (is_null($this->execOnly)
                || (is_array($this->execOnly)
                    && in_array($key, array_values($this->execOnly))
                    )
                ) {
                $this->output->write('['.$key.'\\'.$total.'] ');
                $upgrade->go();
            }
        }
    }

    private function loadDBUpgradeClasses()
    {
        //TODO make this a bit more dynamic
        $path = $this->laravel->databasePath().'/upgrade-db/upgrades/*.php';
        $classes = [];

        //load base class
        require_once $this->laravel->databasePath().'/upgrade-db/BaseUpgradeDBAbstractClass.php';

        foreach (glob($path) as $file) {
            require_once $file;

            $file = basename($file, '.php');

            //Avoid crash when splitting name
            if (! Str::contains($file, '_')) {
                continue;
            }

            [$order, $class] = explode('_', $file);
            $order = (int) $order;

            if (! is_subclass_of($class, 'BaseUpgradeDBAbstractClass')) {
                continue;
            }

            if (! class_exists($class)) {
                $this->error('The file '.$file.' needs to have the class name equal to the second part of the filename');
                exit();
            }

            //Casting to int should ensure that if it's not an integer it's 0 and therefore detected
            if ($order < 1 || isset($classes[$order])) {
                $this->error('The file '.$file.' doesn\'t have a correct ORDER value setted in its filename');
                exit();
            }

            $classes[$order] = new $class($this, $this->dryRun);
        }

        return $classes;
    }

    private function setOptions()
    {
        $this->dryRun = $this->option('dry-run');
        $this->noInteractions = $this->option('no-interaction');
        $this->execOnly = $this->option('exec-only') ? explode(',', $this->option('exec-only')) : null;
    }

    private function addWarningStyle()
    {
        if (! $this->output->getFormatter()->hasStyle('warning')) {
            $style = new OutputFormatterStyle('yellow');

            $this->output->getFormatter()->setStyle('warning', $style);
        }
    }
}
