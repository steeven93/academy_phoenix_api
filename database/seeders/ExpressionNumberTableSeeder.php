<?php

namespace Database\Seeders;

use App\Models\ExpressionNumber;
use App\Models\ExpressionNumberCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExpressionNumberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ExpressionNumberCategory::create([
            'id'  =>  1,
            'name'  =>  'DEFAULT'
        ]);

        ExpressionNumberCategory::create([
            'id'  =>  2,
            'name'  =>  'EXPRESSION'
        ]);

        ExpressionNumberCategory::create([
            'id'  =>  3,
            'name'  =>  'SOUL'
        ]);

        ExpressionNumberCategory::create([
            'id'  =>  4,
            'name'  =>  'PERSONALITY'
        ]);



        ExpressionNumber::create([
            'number'    =>  1,
            'content'    =>  "",
            'content_light'    =>  "si tratta di una personalità con una forte determinazione e forza di carattere, crede fortemente nelle proprie possibilità ed ha una grande autostima. Portata nel lavoro autonomo, si rivela capace di soluzioni innovative e con capacità di proporre nuovi progetti. Di indole altruista, ambiziosa, attiva, indipendente e con forte senso degli affari. Di intelligenza brillante, con logica e velocità di pensiero che la spingono all'iniziativa e alla caccia alle sfide.",
            'content_shadow'    =>  "combatte per mantenere il potere sui suoi coetanei dove attirandoli, li sottomette a proprio vantaggio. È un soggetto senza scrupoli che usa le persone incurante delle sofferenze che provoca, si porta dietro le ferite ed essendo fragile vede gli altri come una minaccia da estinguere.",
            'ipo'    =>  "si sente indifeso e facilmente attaccabile, è arrendevole, servile e sottomesso. Oppone scarsa resistenza alle avversità, insicuro e incapace di compiere un'azione derivante da mancanza di fiducia in sé stesso e nelle proprie capacità. Si adatta per mancanza di spirito di reazione a sopportare un dolore, una sofferenza, una rinuncia o una situazione infelice.",
            'iper'    =>  "la sua aggressività lo porta ad assalire e provocare, è arrogante e tratta gli altri con asprezza e presunzione. Con atteggiamenti litigiosi e rigidi, si lascia andare a manifestazioni meschine e puntigliose di insofferenza. Mostra o manifesta un entusiasmo eccessivo o esclusivo per qualcuno o qualcosa. Si dimostra vanitoso, mostrando le proprie qualità fisiche, morali o intellettuali, vere o presunte.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  2,
            'content'    =>  "",
            'content_light'    =>  "appare delicato e generoso, giocoso e fantasioso, con capacità umane elevate e qualità innegabili del cuore le sue qualità attraggono anime sofferenti. Dotato di diplomazia e intuito, in lui c’è la speranza, la volontà di creare e donare al prossimo un mondo migliore, la totale fiducia con cui si relaziona, gli dona apertura, capacità di apprendimento e sensibilità.",
            'content_shadow'    =>  "le esperienze orfanizzanti, di abbandono e ingiustizie se non vengono comprese, elaborate e perdurano nel tempo, nutrono nell’individuo uno sorta di pessimismo, non crede più nei propri sogni, nella giustizia e tanto meno nell’amore. È di fondamentale importanza che attraverso le esperienze dolorose da lui provate, impari a scegliere ambienti e persone con i quali condividere il proprio essere senza creare dipendenza da qualcuno e riponendo fiducia in sé stesso.",
            'ipo'    =>  "ha paura di stare solo è spesso sfiduciato, necessita di dipendere da qualcuno con il quale si relaziona passivamente, è incauto, imprudente, pigro, sconsiderato e sente un vuoto interiore.",
            'iper'    =>  "è un soggetto menefreghista e insensibile, si intromette in questioni a lui estranee, si dimostra freddo e pronto alla critica, indiscreto e sentenzioso.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  3,
            'content'    =>  "",
            'content_light'    =>  "si esprime attraverso la spontaneità e la curiosità, libero da ogni giudizio e condizionamento, ogni azione appare per il puro piacere di farla, senza secondi fini o scopi. Appare con una personalità estroversa, creativa, espressiva e amichevole, talenti artistici e acuta intelligenza, lo rendono un soggetto capace di distinguersi a livello professionale e sociale. Parlare, scrivere, dipingere, cantare e suonare sono attività in cui si sente maggiormente a suo agio. Gentile e premuroso, gioioso e sensibile, ha una logica analitica preziosa nelle sue relazioni",
            'content_shadow'    =>  "la paura di non trovare riconoscimento mostrandosi per chi è nella sua vera natura e a farsi comprendere dagli altri, lo porta a sviluppare un atteggiamento prevenuto e critico, disapprovatore e ostile; se prima sperimentava per puro piacere, in ombra sperimenta fino alla follia, lo sperimentare per gioco trasforma il piacere in vizio, la sessualità in lussuria e i piaceri diventano insaziabili, la sua malsana esuberanza, dà vita a comportamenti autodistruttivi.",
            'ipo'    =>  "risulta essere scortese, e pessimista manifestando atteggiamenti di sfiducia nei confronti degli aspetti di una situazione, asociale, lunatico, triste, abbattuto, inadattabile alle circostanze,  poco integrato e inadeguato. Superficiale e dispersivo, non esamina a fondo le cose e si comporta con leggerezza. poco creativo, tendente ad auto criticarsi.",
            'iper'    =>  "polemico e con atteggiamenti di risentita opposizione alimentata da divergenza di opinioni, prevenuto, saccente e invidioso. Si propone con durezza, arroganza, aggressività e dai modi sgarbati, è ansioso, possessivo e geloso.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  4,
            'content'    =>  "",
            'content_light'    =>  "è l'apparenza di una personalità coraggiosa, combattiva, efficiente e discreta. Ha grandi capacità di lavoro dove si impegna con serietà e fatica, l’inventiva e la sua pienezza di risorse, lo rendono un abile risolutore di problemi.",
            'content_shadow'    =>  "si sente privato della libertà, vede le sue opportunità limitate, condizionato dai suoi rigidi principi si sente prigioniero delle regole. Lavora in modo eccessivo lamentandosi per la fatica, ha paura dell'ignoto e vive la vita in modo sterile.",
            'ipo'    =>  "rivela inerzia, lentezza e svogliatezza, ha indecisione ed è poco sicuro nel fare quando dovrebbe. Rifugge la fatica, lo sforzo e l'impegno intellettuale, è privo di organizzazione e agisce in modo confuso e disordinato, ha mancanza di coordinazione nel programmare e attuare.",
            'iper'    =>  "testardo, ostinato nei suoi atteggiamenti e comportamenti, di scarsa elasticità mentale, dimostra sfiducia nei confronti dei consigli altrui.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  5,
            'content'    =>  "",
            'content_light'    =>  "apparire mutevole, curioso, mostra interesse a tutto e vuole fare tantissime esperienze soprattutto sensoriali. Di spirito libero, e mentalità aperta, socievole; affascina il suo modo sempre attento e i suoi atteggiamenti originali. Intelligente e vivace, sempre alla ricerca di inventare nuovi modi di vivere. Usa argomenti logici e una conoscenza razionale. Ama spostarsi, viaggiare e conoscere persone nuove. La sua adattabilità e flessibilità lo pone al livello del suo interlocutore permettendogli di destreggiarsi in situazioni che richiedono diplomazia e argomentazioni",
            'content_shadow'    =>  "non evolve e  non estrae saggezza dall'esperienza, continua a fare esperienze senza trascenderle ritrovandosi in balia della vita. Si sente insoddisfatto e con un vuoto interiore. Bisognoso di continue e nuove esperienze per le quali si  rivela insaziabile imprudente e precipitoso. Necessita di sperimentare appagando i sensi, i suoi eccessi sfociano in piaceri sempre più intensi fino alla dipendenza da sostanze e vizi.",
            'ipo'    =>  "teme le novità e il progresso, è indeciso, insicuro, confuso e non sperimenta. La sua sfiducia nei confronti del prossimo e della vita, lo rendono inadattabile e insensibile, inespressivo e noioso.",
            'iper'    =>  "si dimostra insoddisfatto e irresponsabile, capriccioso eccentrico e con nervosismo eccessivo, la sua ricerca nelle emozioni lo porta a  stati di eccitazione che lo rendono insaziabile, è incurante del senso del pudore, la ricerca negli eccessi contrariamente alle norme della morale, lo  rende un soggetto libertino.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  6,
            'content'    =>  "",
            'content_light'    =>  "è l'apparenza di una personalità stabile, radiosa e accomodante, la devozione spontanea con potenziali di tenerezza, amore, generosità e senso di responsabilità lo porta a sacrificarsi, e a dare il massimo di se stesso  per gli altri. Attraverso la sua sensibilità, riesce a sentire ciò che è invisibile e a cogliere ciò che sta accadendo oltre le barriere mentali. Ha in se  una combinazione di intuizione, ispirazione e logica. Si dimostra affettuoso, comprensivo e riconoscente.",
            'content_shadow'    =>  "l’individuo si trova a prendersi cura degli altri senza aver sviluppato una vera indipendenza e identità, cerca affetto costringendo gli altri a darlo, aggredisce con ricatti morali e diventa freddo se non è contraccambiato. Non avendo ricevuto amore, attira a sé persone con bassa autostima e bisognose, non sa dire di no per paura del rifiuto e si sente in obbligo quando riceve qualcosa.  Assume un atteggiamento opprimente  e soffocante, diventando freddo se non ottiene ciò che vuole.",
            'ipo'    =>  "è una personalità malinconica e infelice, soffre di vittimismo, talvolta distante, freddo, indifferente e inospitale. Trascurato nell’aspetto e senza amore, si dimostra indifferente  e non cooperativo, difficoltà nell’affermare le sue idee, prevenuto, chiuso afflitto e indeciso.",
            'iper'    =>  "egoista, amante del lusso e indiscreto. Diviene vendicativo, cinico e impassibile, spiacevole e negligente, pedante e impersonale, irragionevole, irrazionale e disorganizzato.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  7,
            'content'    =>  "",
            'content_light'    =>  "si presenta con una personalità introversa, segreta e solitaria. Corrisponde ad un soggetto indipendente, perfezionista e con evidenti aspetti intellettuali e spirituali. Alla costante ricerca di verità e conoscenza, cerca di soddisfare i suoi gusti per studio e riflessione personale. la sua conoscenza lo porta ad orientarsi verso professioni come ad esempio la ricerca di laboratorio, la farmaceutica, l’analisi, la ricerca. Analitico e perfezionista, esigente con se stesso e con gli altri.",
            'content_shadow'    =>  "giudica freddamente, rifiuta i legami per paura dell'attaccamento, presenta difficoltà ad esprimere emozioni, è diffidente e si difende con critica e giudizio. Possiede una mente dominata dalla razionalità e il perfezionismo diviene mania.",
            'ipo'    =>  "si sente impotente, inefficace, è inutile asociale e  privo di fiducia, indeciso e indifferente. Si isola, è taciturno e non mostra emozioni. Ingenuo, sbadato e malinconico",
            'iper'    =>  "la sua  presunzione lo pone come persona saccente, pignola e ipercritica, si dimostra impaziente e insensibile, è  antisociale e talvolta si relaziona con atteggiamenti di diffidenza e inflessibilità.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        // ExpressionNumber::create([
        //     'number'    =>  8,
        //     'content'    =>  "",
        //     'content_light'    =>  "",
        //     'content_shadow'    =>  "",
        //     'ipo'    =>  "",
        //     'iper'    =>  "",
        //     'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        // ]);

        // ExpressionNumber::create([
        //     'number'    =>  9,
        //     'content'    =>  "",
        //     'content_light'    =>  "",
        //     'content_shadow'    =>  "",
        //     'ipo'    =>  "",
        //     'iper'    =>  "",
        //     'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        // ]);

        // ExpressionNumber::create([
        //     'number'    =>  "",
        //     'content'    =>  "",
        //     'content_light'    =>  "",
        //     'content_shadow'    =>  "",
        //     'ipo'    =>  "",
        //     'iper'    =>  "",
        //     'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        // ]);

    }
}
