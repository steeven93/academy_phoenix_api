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

        ExpressionNumber::create([
            'number'    =>  8,
            'content'    =>  "",
            'content_light'    =>  "è l'apparenza di una personalità forte, disponibile e attiva, alla ricerca del potere su tutte le cose, ha grandi capacità di coraggio, concentrazione e controllo interiore. Ambiziosa nel raggiungere grandi risultati sul piano materiale, economico ma anche sociale, il suo successo negli affari è molto possibile in quanto è audace, auto-disciplinato ed energico. Di carattere deciso, astuto, convincente e  persuasivo, è sicuro di se, le sue  idee sono chiare e ricche di iniziative.",
            'content_shadow'    =>  "pretende riconoscimento limitando e mantenendo il controllo su gli altri.  Il suo fare può essere se a lui utile, minaccioso e prepotente, l’attaccamento ai beni materiali, lo rende una persona avara, la sua presunzione lo pone come il migliore di tutti e gli altri vengono visti come pedine da spostare per il proprio tornaconto. Il mondo in cui vive è per lui è una realtà ricca di insidie dalle quali proteggersi con ogni mezzo.",
            'ipo'    =>  "la sua insicurezza e disorganizzazione, incutono in lui la paura di fallire, è una persona inattendibile e incapace, con ristrettezza di vedute e poco realista. Si sente abbattuto, avvilito e vulnerabile, nervoso, pigro e apatico.",
            'iper'    =>  "è una persona dal sangue freddo che abusa del potere con prepotenza e crudeltà a protezione dei i suoi beni materiali. E’ offensivo e intollerante, litigioso e senza scrupoli, si dimostra asociale e intollerante, spesso con assenza di tatto e prevenuto. Insensibile e polemico, egoista e sgarbato.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  9,
            'content'    =>  "",
            'content_light'    =>  "si identifica in una personalità altruista e compassionevole, dotato di reali capacità di dedizione e disponibilità, che lo porta a prodigarsi verso gli altri con amore incondizionato. È generoso, disponibile, accogliente, con elevato potenziale spirituale e umanitario, ha capacità di influenzare e dirigere le masse. Riesce a suscitare forti emozioni con la sua arte.",
            'content_shadow'    =>  "si sente invaso e condizionato da tutto ciò che di male può trovare nel mondo opponendosi con freddezza totale. Se si fa strada il suo ego, ha impulsi di orgoglio che lo fanno apparire un esaltato o un asociale, con tendenza al disordine e azioni contrastanti che creano amarezza e scoraggiamento, predica bene per indurre gli altri a soddisfare i propri interessi.",
            'ipo'    =>  "è insensibile e sfiduciato in tutto ciò che lo coinvolge, mantiene un atteggiamento distaccato e indifferente, menefreghista e riservato, appare come una persona insoddisfatta, indecisa e malinconica.",
            'iper'    =>  "in questa condizione troviamo un soggetto egoista, intollerante e di facile irascibilità, diviene irresponsabile, geloso e di mentalità ristretta, ha un atteggiamento scortese e prevenuto, disapprova mostrandosi contrariato divenendo duro, accanito e capriccioso.",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_EXPRESSION
        ]);

        ExpressionNumber::create([
            'number'    =>  1,
            'content'    =>  "ambizione e desiderio di successo personale caratterizzano i suoi impulsi profondi. Una vibrazione energica e creativa lo spingono a mostrare originalità e innovazione, i suoi ideali nella realizzazione a livello materiale e spirituale, sono onestà e forza, coerenza e giustizia, non si dà mai per vinto, in quanto non rinuncia mai a ciò che ama. Desidera essere indipendente, avere un lavoro autonomo senza interferenze, essere ascoltato e lodato, ottenere risultati importanti, emergere, essere un leader, fidarsi  di  più di  se  stesso e  delle  proprie  decisioni.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  2,
            'content'    =>  "sensibile e affettuoso, sogna l'amore, la tenerezza, l'armonia e la pace profonda. cerca l’unione in un ambiente di vita confortevole e caldo. Buon servitore, dimostra raffinatezza, pazienza e diplomazia. Cerca di associarsi, di essere dipendente e di lavorare per gli altri. Di poche ambizioni e assenza di iniziative autonome. Disposto a tutto pur di mantenere l'amicizia, un  matrimonio o unioni in genere. Si annulla pur di evitare una discussioni o litigi.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  3,
            'content'    =>  "Riesce ad esprimersi con umorismo e gioia di vivere, a comunicare con entusiasmo e giovialità. Grandi impulsi creativi lo animano favorendo il suo ottimismo sulla vita apprezzando gli aspetti positivi da ogni situazione. Nelle relazioni interpersonali associa convivialità  e gentilezza che vengono riconosciute da tutti e per i quali desidera che siano felici, divertiti e sorridenti e dove il desiderio di essere al centro dell’attenzione, lo trasforma nel clown che rallegra interi gruppi.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  4,
            'content'    =>  "cerca la regolarità nella sua vita, dove ha un gran bisogno di essere amato e rassicurato. Vuole costruire solidamente, lavorare con ordine, metodo, e trascurare dettaglio. La sua serietà ispira rispetto e fiducia. Ragionamento e senso pratico lo rendono utile e prezioso. Rispetta tradizioni e valori, mantiene la parola data e ha il senso dell'onore. Ha metodica, sequenzialità e precisione, necessità di costruire qualcosa di solido e di guadagnarsi le cose con fatica e sudore.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  5,
            'content'    =>  "la  ricerca nelle novità, la varietà e i cambiamenti per soddisfare la sua curiosità, lo stimolano ad esperienze sempre diverse. Difende la sua libertà personale desiderando una vita piena, movimentata e ricca di avventure. Di mente intelligente e rapida, si adatta velocemente alle nuove situazioni, il suo comportamento originale con frequenti trasformazioni, accentuano il suo fascino. Debole nella stabilità sentimentale, si sente come una farfalla che si posa su più fiori per assaporarne la variabilità nelle sensazioni.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  6,
            'content'    =>  "spinto a cercare amore, armonia e stabilità per il quale desidera tranquillità e sicurezza. Senso innato della famiglia, disponibile per gli altri e sempre pronto a svolgere un ruolo di ascolto e protezione, calma, calore e indulgenza ravvivano la sua aura magnetica. Emana gentilezza, tenerezza e dolcezza, pace, tolleranza ed equilibrio. Si dimostra sensibile, con senso di bellezza e amante delle arti, conciliante e persona di fiducia, affronta le responsabilità che gli vengono assegnate.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  7,
            'content'    =>  "cerca la calma e la tranquillità per meditare, studiare e soddisfare il suo desiderio di conoscenza. La sua vita interiore è molto ricca ed è privilegiato il piano mentale, ha l'anima del filosofo e del ricercatore. Emotività, relazioni affettive e sentimentali non gli appartengono, punta più al benessere della mente che a quello fisico perché stimolato dalla conoscenza. Propensione per la spiritualità e il misticismo. Perfezione e cura dei dettagli, fanno parte del suo bagaglio di talenti.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  8,
            'content'    =>  "spinto a cercare potere, successo materiale ed espansione personale a tutti i livelli. Ambizioso, intraprendente e tenace, aspira ad acquisire potere e ricchezza, esprime determinazione nei suoi progetti e a lavorare intensamente. Sicuro di sé e coraggioso, ha l'anima di uno stratega. La sua forza di carattere e il suo spirito combattivo lo aiutano a non abbandonare mai la battaglia. La lotta per la giustizia e la verità, fanno parte del suo programma mentale.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  9,
            'content'    =>  "motivato sulla via della saggezza, della conoscenza universale e al sacrificio per gli altri. Condivide la sua esperienza, le sue conoscenze e i messaggi delle sue intuizioni a tutti. Una mente di grandi vocazioni e alti ideali, la sua sensibilità verso i problemi del mondo, lo rendono un grande umanista alla ricerca della verità, della fraternità e giustizia sociale. La sua sensibilità, intuizione e i suoi doni visionari, lo fanno viaggiare per il mondo oltre i confini di razza e nazionalità per portare unione, benessere e condivisione.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_SOUL
        ]);

        ExpressionNumber::create([
            'number'    =>  1,
            'content'    =>  "sente il bisogno di guidare, essere attivo e autonomo, la sua creatività lo porta a cercare idee nuove e originali. Trasmette sicurezza e determinazione, attirando a sé caratteri simili e persone dall'animo fragile e insicure perché con lui si sentono protette. Affronta le  difficoltà con coraggio destreggiandosi di fronte agli ostacoli, sa prendere iniziative e perseverare nelle sue scelte personali. Dovrà controllare la sua impazienza con coloro che non stanno al suo passo e la sua vanità.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  2,
            'content'    =>  "appare delicato e generoso, giocoso e fantasioso, capacità umane elevate e qualità innegabili del cuore attraggono anime sofferenti. Dotato di diplomazia e intuito, si rende disponibile all’ascolto e alla collaborazione, in lui c’è la speranza, la volontà di creare e donare al prossimo un mondo migliore, la totale fiducia con cui si relaziona, gli dona apertura, capacità di apprendimento e sensibilità. Dovrà non aggrapparsi troppo agli altri contando su di loro per risolvere i suoi problemi interiori.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  3,
            'content'    =>  "Sente il bisogno di esprimere sè stesso attraverso contatti e scambi. Tendenzialmente ottimista, socievole e affascinante, gli piace creare atmosfere piacevoli, allegre e anche farsi notare. La sua struttura di base è versatile e comunicativa spingendolo a molteplici interessi. Necessita di un mondo idilliaco dove tutto è festa, musica e giovialità. Dovrà controllare la sua immaginazione, rallentare il suo eccessivo entusiasmo e controllare la sua tendenza alla dispersione",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  4,
            'content'    =>  "appare affidabile, cauto ma efficiente, meticoloso e preciso, necessita di lavorare nel rispetto delle norme e costruire con ordine e metodo, desidera regole e schemi sicuri. Predilige relazioni schiette e lealtà tra persone serie. La sua struttura di base è solida, dovrà evitare troppo rigore  e controllare la sua tendenza alla testardaggine e alla rigidità.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  5,
            'content'    =>  "vuole vivere più esperienze possibili, cambiare, rischiare, giocare con la vita e conquistare, sia per combattività personale che per il gusto dell'avventura. Curioso e bisognoso di conoscere e superare i suoi limiti, dinamico, veloce, attivo e pronto a cambiare direzione. Vive intensamente per soddisfare il suo desiderio di compiacere adattandosi alle più svariate situazioni. Ama viaggiare, conoscere nuovi spazi, nuove persone e avviare nuove imprese. È come se si sentisse in una costante ascesa verso le vette del piacere. Dovrà cercare di evitare eccessi fisici di varia natura e applicare nella vita una regolare cautela per mantenere una certa stabilità",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  6,
            'content'    =>  "desidera intorno a sé un clima di pace, di dolcezza e amare senza limiti. Cerca stabilità, la famiglia, fondamentalmente buono e conciliante, è attratto dalla bellezza in tutte le sue forme, l’armonia nel modo di vestire e di parlare denotano la sua sensualità. Qualità di ascolto e il suo calore affettivo, sono i doni maggiormente evidenti. Golosità e gusto nel mangiare sono altre caratteristiche del 6. Dovrà imparare a non farsi manipolare a causa della sua generosità, ed evitare di influenzare le persone che lo circondano per elemosinare amore.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  7,
            'content'    =>  "bisognoso di arricchirsi spiritualmente attraverso un processo di indipendenza ed energia mentale di tipo introspettivo. Desidera una vita calma e solitaria per realizzare la sua ricerca personale. Ambisce a una conoscenza elevata  dove analizza  e approfondisce i misteri dell’uomo, della vita e dell’universo. Intelligente e saggio, ottimo insegnante, predilige percorsi scientifici e fare scoperte. Dovrà imparare ad aprirsi agli altri, soprattutto emozionalmente e sentimentalmente, in quanto, la sua tendenza all'isolamento e alla malinconia, lo fanno rimanere distante e misterioso.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  8,
            'content'    =>  "sente il bisogno di realizzare grandi opere ed essere apprezzato per il suo potere e il suo successo. Utilizza la sua energia, la sua passione e il suo coraggio per raggiungere i suoi obiettivi. Abile nel trattare le persone, sicuro di se, vitale, ha grandi riserve di energia psichica e fisica che gli permettono di realizzare le concretizzazioni più ambiziose. I suoi progetti mirano soprattutto alla sua immagine, al suo dinamismo e alle sue aspirazioni. Dovrà controllare la sua tendenza all’impulsività e intolleranza.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);

        ExpressionNumber::create([
            'number'    =>  9,
            'content'    =>  "bisognoso di dedicarsi alla comunità e trasmettere le sue scoperte, i suoi punti di vista globali dove condividere i suoi grandi ideali. Necessita di impegnarsi in modo umanitario e soddisfare le sue esigenze nell’ aiutare gli altri sogna un mondo migliore dove regni la fratellanza, condivisione e aiuto reciproco. Forte sensibilità ai problemi altrui lo rendono disponibile nel sociale con impulsi disinteressati e missioni appassionate verso il prossimo. Dovrà stare attento a mantenere il senso della realtà e a non passare come illuminato o visionario.",
            'content_light'    =>  "",
            'content_shadow'    =>  "",
            'ipo'    =>  "",
            'iper'    =>  "",
            'expression_number_category_id'    =>  ExpressionNumberCategory::EXPRESSION_NUMBER_CATEGORY_PERSONALITY
        ]);
    }
}
