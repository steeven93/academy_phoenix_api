<?php

namespace Database\Seeders;

use App\Models\GrillBox;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GrillBoxTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        GrillBox::create([
            'ref_number'   =>  1,
            'ipo'   =>  'Riempimento al di sotto della percentuale: sensazione di insicurezza ed esitazione prima delle scelte. Le sue ambizioni tendono ad essere un po’ limitate, dubita della sua capacità di iniziativa. Carenza di volontà. Assenza di lettere: non è in grado di decidere e di agire da solo, sembra privo di ambizione personale. Assenza di fiducia in se stesso e mancanza di coraggio. Fa troppo affidamento sull\'aiuto degli altri per evitare di affrontare gli ostacoli.',
            'equilibrium'    =>  'Riempimento in media percentuale: sa come contare su se stesso per realizzare le sue creazioni o iniziare progetti. Ha la capacità di condurre correttamente le sue scelte da solo e seguire la direzione che si è prefissato. Deciso nelle sue scelte anche in caso di cambio di direzione. Dotato di iniziativa e facilità nel guidare, stimola coloro che sono meno veloci e meno determinati di sè.',
            'iper'  =>  'Riempimento in eccesso: Si sente il capo, molto ambizioso con ego sviluppato, prepotente e tirannico. Egoista, orgoglioso, vanitoso. Il suo coraggio lo spinge oltre gli ostacoli perché deve dimostrare il suo valore. Impulsivo impaziente, aggressivo. Impone eccessivamente le sue opinioni esageratamente a discapito degli altri. Mette in prima linea se stesso sminuendo gli altri.',
        ]);

        GrillBox::create([
            'ref_number'   =>  2,
            'ipo'   =>  'Riempimento al di sotto della percentuale: non gli piace avere troppe persone attorno, tende a diffidare degli altri. Rifugge gli scambi intimi e le confidenze, combattuto, indeciso e pigro negli scambi affettivi. Assenza di lettere: appare allergico agli scambi e associazioni troppo strette. Evita la collaborazione e spesso, le sue posizioni, sono troppo rigide. Poca o nulla la sua pazienza, diplomazia e indulgenza verso gli altri. Infastidito dal carattere delle persone che lo circondano, non accetta di essere guidato.',
            'equilibrium'    =>  'Riempimento in media percentuale: é l\'alleato ideale, ha la capacità di collaborare e associarsi sia sul lavoro sia affettivamente. La sua sensibilità è uno dei suoi principali punti di forza per creare unioni, la sua flessibilità di carattere lo rende un compagno ideale. Necessita di far parte di un gruppo in un ambiente affettivamente ed emotivamente sicuro.',
            'iper'  =>  'Riempimento in eccesso: ipersensibile, passivo, ubbidiente e indeciso, si aggrappa e si affida troppo agli altri al punto di dipendere dagli altri. necessita di essere protetto e stimolato da qualcuno. La troppa disponibilità, flessibilità e gentilezza lo rendono privo di personalità.',
        ]);

        GrillBox::create([
            'ref_number'   =>  3,
            'ipo'   =>  'Riempimento al di sotto della percentuale: sembra avere qualche difficoltà ad esprimere se stesso quando deve confrontarsi con più persone contemporaneamente in quanto teme il giudizio degli altri, scontentezza e abbattimento. Tendenza all’introversione e a mettersi in disparte.    Assenza di lettere: desidera esprimere le sue iniziative ma non riesce a trovare il modo per manifestarsi. Imbronciato, pessimista, sconsolato, fa difficoltà ad integrarsi nei gruppi in quanto sembra mancare il senso della comunicazione e l’umorismo. Fa difficoltà a creare il proprio stile per timore di essere giudicato come è nel suo modo di fare.',
            'equilibrium'    =>  'Riempimento in media percentuale: è estroverso, socievole, esilarante e vivace, di facile contatto, aspetto affabile e sorridente, gentile, amichevole e creativo. Il potenziale di espressione è, in generale, rivolto alle arti comunicative. Si adatta bene nei gruppi e sa come mantenere elevato l’umore.',
            'iper'  =>  'Riempimento in eccesso: dotato di grande immaginazione, stravaganza e pettegolezzo esagerato che sfociano in impulsi di snobismo. La sua capacità di adattamento si trasforma in un mettere maschere e far vedere agli altri ciò che non è diventando esperto di bluff. Superficiale negli argomenti, non ascolta gli altri, ipercritico.',
        ]);

        GrillBox::create([
            'ref_number'   =>  4,
            'ipo'   =>  'Riempimento al di sotto della percentuale: irregolare nel rispettare impegni, schiva gli sforzi e il lavoro. Tendenza alla negligenza e alla pigrizia. Indeciso e debole volontà. Assenza di lettere: pigrizia, sbadataggine, irresponsabilità, dispersione e mancanza di organizzazione. Si sente prigioniero della routine quotidiana, servile e arrendevole, insoddisfatto nel lavoro. Non riesce a padroneggiare e organizzare l’ambiente in cui vive.',
            'equilibrium'    =>  'Riempimento in media percentuale: Produttivo, instancabile, affidabile, preciso e meticoloso sono i suoi principali punti di forza. Dotato di grande capacità organizzativa per realizzare materialmente e solidamente la vita domestica e professionale. Puntuale, perseverante, non lascia nulla al caso. È un costruttore di solidità.',
            'iper'  =>  'Riempimento in eccesso: impostato, intrappolato nelle sue idee e nei suoi pregiudizi, ossessionato dal lavoro, si dimentica le gioie della vita e il bisogno di rilassarsi. Agisce con ordine e metodo maniacale, si perde nei dettagli discostandosi dal risultato finale. Non si scoraggia di fronte alla fatica, gli piace far vedere ai superiori il suo valore.',
        ]);

        GrillBox::create([
            'ref_number'   =>  5,
            'ipo'   =>  'Riempimento al di sotto della percentuale: tende alla sedentarietà aggrappandosi alle proprie idee, teme di lasciarsi trasportare dal rinnovamento e dal cambiamento. Dubita della sua capacità di affrontare l\'ignoto.    Assenza di lettere: chiuso e resistente nei confronti delle novità e del cambiamento, geloso della libertà altrui, non crede che altri possano sperimentare cose prima di lui. Arretrato, distaccato e privo di scopo. Teme di buttarsi su qualcosa di nuovo in quanto tende all’incertezza e alla staticità.',
            'equilibrium'    =>  '   Riempimento in media percentuale: libero e autonomo, attivo, audace, avventuroso, spirito giovanile, grande flessibilità, necessita di cambiamenti, dei suoi spazi e della sua libertà. È veloce nel pensiero con una mente aperta e di larghe vedute, sempre pronto all’evoluzione, alla trasformazione e a nuove conoscenze. Appare dinamico e accelerato.',
            'iper'  =>  'Riempimento in eccesso: energia in eccesso, impulsività, attivismo esagerato, eccesso di curiosità, velocità, instabilità e squilibrio interiore. Difende la propria libertà e la soddisfazione dei propri desideri con azioni esagerate ed eccessi. Le sue idee eccentriche causano disagi agli altri. Vita e abitudini frenetiche per sentirsi eccitato costantemente.',
        ]);

        GrillBox::create([
            'ref_number'   =>  6,
            'ipo'   =>  'Riempimento al di sotto della percentuale: si aggrappa alle sue richieste chiedendo troppo agli altri. Si lamenta degli obblighi quotidiani prendendo distanza dalle responsabilità. Scarsa capacità di comprendere i bisogni degli altri e di dare il buon esempio. Assenza di lettere: tendenza alla freddezza, all’egoismo e all’insensibilità nella vita di relazione. Dà per scontato che gli altri soddisfino i suoi bisogni. Lamentoso e svogliato fa le cose con poca passione e scarso amore. Scarse capacità di riconciliazione nella vita di relazione, di manifestare sentimenti profondi, di promuovere la vita coniugale e di essere un genitore calmo e comprensivo.',
            'equilibrium'    =>  'Riempimento in media percentuale: Gentile e comprensivo, sa come adattarsi alle situazioni e impegnarsi con responsabilità. L\'armonia e l\'amore sono i due assi principali con cui si muove per sostenere e aiutare materialmente e moralmente. Presenza confortante e capacità di conciliazione lo rendono un conciliatore ragionevole e compassionevole.',
            'iper'  =>  'Riempimento in eccesso: tendenza a lasciarsi schiacciare dalle responsabilità a causa del suo buon cuore. La sua iperemotività, ipersensibilità e ipercoinvolgimento lo portano a caricarsi di responsabilità eccessiva per gli altri, vorrebbe che tutto fosse armonico e buono, ma la sua tendenza al voler essere da esempio e orientato al sacrificio lo trasforma in un criticone, impiccione e soffocante',
        ]);

        GrillBox::create([
            'ref_number'   =>  7,
            'ipo'   =>  'Riempimento al di sotto della percentuale: sbadataggine, incuria e incertezza lo fanno apparire impacciato e inefficace. Smemoratezza e confusione a causa del sovrapporsi di idee illogiche e insensate che rallentano la sua crescita sul piano della consapevolezza. Assenza di lettere: ingenuità, superficialità e mancanza di riflessione allontanano dalla ricerca interiore e dal significato della vita. Tendenza a rimanere sulla pura intellettualità con ragionamenti circolari che alimentano la confusione e l’incapacità di aprirsi alla spiritualità.',
            'equilibrium'    =>  'Riempimento in media percentuale: l’intelligenza, la razionalità, la capacità di indagare nel profondo sono i suoi beni più preziosi. Grande osservatore, analitico, introspettivo, capace di accedere a conoscenze astratte e ad avere una nozione del divino particolarmente sviluppata. Sempre alla ricerca sul perché del tutto, vuole capire cosa governa la psiche umana. È colui che dà origine a scoperte geniali e fondamentali.',
            'iper'  =>  'Riempimento in eccesso: impulsi di intransigenza e fanatismo associati a perfezionismo e mente analitica molto sviluppata, comportano rigidità nei pensieri con un approccio solitario e individualista che porta a fuggire dalla società come un eremita. In eccesso la sua vita interiore con una introversione a volte malsana. Freddezza emotiva.',
        ]);

        GrillBox::create([
            'ref_number'   =>  8,
            'ipo'   =>  'Riempimento al di sotto della percentuale: tendenza ad accumulare beni come un collezionista perché questo gli dà la sicurezza di sentirsi ricco. Si accontenta di apparire coraggioso, indipendente, che intraprende grandi progetti ma che nei fatti tende a rinunciare per timore di non essere all’altezza. Assenza di lettere: preferisce fare agire gli altri piuttosto che mettersi in gioco, scappa dalle difficoltà. Non è attratto dal potere per paura di fallire. Ha difficoltà nella gestione e nell’organizzazione della propria vita riguardo ai beni materiali.',
            'equilibrium'    =>  'Riempimento in media percentuale: ha una giusta consapevolezza delle cose materiali e ne conosce il loro vero valore nella vita. Necessita di intraprendere ambiziosi progetti, ciò che promette fa in quanto è ben organizzato. Audace in grado di superare qualsiasi ostacolo con un senso della giustizia innato. Costruttore coscienzioso che fa miracoli. Evita di perdersi sui campi incerti delle emozioni e dei sentimenti.',
            'iper'  =>  'Riempimento in eccesso: tendenza alla direzione, raggiunge velocemente i suoi obiettivi spesso con intolleranza, tensione interna e rigidità. Testardo che abusa del potere e spesso è sfrontato e oppressivo. Avidità di potere e crudeltà.',
        ]);

        GrillBox::create([
            'ref_number'   =>  9,
            'ipo'   =>  'Riempimento al di sotto della percentuale: carente la sua compassione, per aiutare gli altri, necessita di condizioni ideali che non richiedano troppo sforzo e troppa disponibilità personale, quanto basta per soddisfare le proprie esigenze in un rapporto di scambio. Assenza di lettere: gli manca quella sensibilità da altruista, è maggiormente interessato a risolvere i propri problemi che quelli altrui. Tendenzialmente distaccato per proteggersi dalle emozioni dalle sofferenze, viene visto come un egoista privato delle sue risorse spirituali e centrato sulle proprie esigenze.',
            'equilibrium'    =>  'Riempimento in media percentuale: equilibrata componente umanitaria che lo spinge a prendersi cura degli altri. Sa ascoltare e comprendere le sofferenze altrui e, attraverso la sua grande sensibilità, generosità e altruismo aiuta gli altri in modo attivo. È il missionario che si sacrifica per gli altri senza chiedere nulla in cambio.',
            'iper'  =>  'Riempimento in eccesso: tendenza a dare più di ciò che è nelle sue riserve in quanto è troppo sensibile alla sofferenza altrui. Sensazione di impotenza e di indecisione di fronte ai problemi del mondo, vorrebbe risolvere tutto per tutti. Si impegna in progetti onorevoli ma che richiedono riserve di energia che spreca a causa del suo fanatismo.',
        ]);
    }
}
