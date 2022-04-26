<?php

abstract class BaseUpgradeDBAbstractClass
{
    private $command;
    private $output;
    private $dryRun;
    protected $infoLine;

    protected $skipMe = false;

    public function __construct($command, $dryRun)
    {
        $this->command = $command;
        $this->output = $this->command->getOutput();
        $this->dryRun = $dryRun;
        $this->setInfoLine();
    }

    abstract protected function setInfoLine();

    abstract protected function condition();

    abstract protected function upgrade();

    public function go()
    {
        $this->output->write('<info>'.$this->infoLine.'... </info>');

        if (! $this->skipMe) {
            if ($this->condition()) {
                if ($this->dryRun) {
                    $this->output->write('<info>YES</info>'.PHP_EOL);
                } else {
                    DB::transaction(function () {
                        $this->upgrade();
                    });

                    $this->afterActions();

                    $this->output->write('<info>DONE</info>'.PHP_EOL);
                }
            } else {
                $this->output->write('<warning>NOT NEEDED</warning>'.PHP_EOL);
            }
        } else {
            $this->output->write('<error>SKIPPED</error>'.PHP_EOL);
        }
    }

    protected function afterActions()
    {
        //Overwriteme
    }

    //TODO add this to Illuminate\Database\Schema\Builder on Laravel Framework with a PR
    protected function isNullable($connection, $table, $column)
    {
        return ! $connection->getDoctrineColumn($table, $column)->getNotnull();
    }
}
