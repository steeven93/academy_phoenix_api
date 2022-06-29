<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersonalYearTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalYear::create([
            'ref_year'      => '1',
            'descrption'   => 'Una grande quantità di stimoli e ampie opportunità può rendere difficile percepire chiaramente la direzione migliore. Potrebbero esserci false partenze e vicoli ciechi con conseguente frustrazione. Il soggetto dovrebbe rendersi conto che non può sfruttare tutte le opportunità. Deve scegliere con cura, sempre con un occhio ai benefici futuri piuttosto che all\'utilità attuale.',
        ]);

        PersonalYear::create([
            'ref_year'      => '2',
            'descrption'   => 'I conflitti emotivi possono aumentare la tensione, turbare la sensibilità, influire sulla salute. L\'autocontrollo e un approccio disciplinato possono aiutare a mantenere un equilibrio armonioso.
            Un senso di prospettiva, in relazione ai ritardi e alle difficoltà, aiuterà ad alleviare la frustrazione. L\'attenzione nel periodo dovrebbe orientarsi sulla presa di consapevolezza che i piani vanno avanti nonostante le deviazioni occasionali.
            ',
        ]);

        PersonalYear::create([
            'ref_year'      => '3',
            'descrption'   => 'A meno che il soggetto non mantenga una forte autodisciplina, è probabile che ci sia un notevole spreco di energia, una irrequietezza che porta a un\'attività superficiale e frivola, una conseguente sensazione di mancanza di piacere o di realizzazione e di frustrazione che accompagna.',

        ]);

        PersonalYear::create([
            'ref_year'      => '4',
            'descrption'   => 'I sentimenti di limitazione o restrizione sono probabilmente forti. Spesso, i sentimenti sono legati al punto di vista del soggetto molto di più che all\'effettivo lavoro in corso. Il soggetto dovrebbe rivalutare la sua posizione se ha la sensazione di trovarsi in una strada senza uscita o di muoversi alla cieca. Dovrebbe chiarire gli ostacoli e prendere provvedimenti per rimuoverli.',

        ]);

        PersonalYear::create([
            'ref_year'      => '5',
            'descrption'   => 'La libertà può essere utilizzata in modo improprio, confondendo il cambiamento costante per il movimento in avanti, perdendosi nei piaceri fisici, nel cibo. bere, sesso, droghe; enfatizzando gli interessi egocentrici con poca preoccupazione per gli altri. A meno che il soggetto non possa sviluppare un approccio equilibrato, è probabile che le opportunità di libertà e cambiamento, nonché le possibilità di sviluppo divertente e costruttivo si rivelino sfuggenti.',

        ]);

        PersonalYear::create([
            'ref_year'      => '6',
            'descrption'   => 'I sentimenti di restrizione sono probabilmente dovuti a una forte responsabilità familiare, o è solamente l\'opinione del soggetto di tali responsabilità. Molta emozione viene percepita nell\'aria. L\'espressione chiara e la volontà di condividere i sentimenti possono portare a un migliore equilibrio. La mancata comunicazione dei sentimenti può portare a confusione e difficoltà.',

        ]);

        PersonalYear::create([
            'ref_year'      => '7',
            'descrption'   => 'Ritiro, accompagnato da modestia, depressione, forti sentimenti di limitazione e disagio emotivo. Il soggetto probabilmente ha bisogno di più relazioni con gli altri, ha la
            sensazione che gli altri siano preoccupati per lui e quindi attende che siano gli altri ad avvicinarsi. Dovrebbe cercare aiuto piuttosto che aspettare che arrivi.',

        ]);

        PersonalYear::create([
            'ref_year'      => '8',
            'descrption'   => 'Potrebbe esserci la tendenza a forzare troppo sul denaro, potere o status. Le opportunità ci sono, ma un\'eccessiva tensione o poca preoccupazione per i bisogni degli altri possono alienare i soci e danneggiare il potenziale. Troppa tensione o troppa sensazione lasciati inespressi possono influire sulle prospettive di salute e di carriera.',

        ]);

        PersonalYear::create([
            'ref_year'      => '9',
            'descrption'   => 'È probabile che i completamenti siano difficili. Le emozioni alte possono causare tensione. Il pensiero e l\'azione chiari sono probabilmente ostacolatI.',

        ]);
    }
}
