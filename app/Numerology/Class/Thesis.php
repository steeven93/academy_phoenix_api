<?php

namespace App\Numerology\Class;

use App\Functions\Matrix;
use App\Models\Anima;
use App\Models\CasellaGrigliaPercentuale;
use App\Models\Griglia;
use App\Models\Lezionekarmica;
use App\Models\Number;
use App\Models\Numeroespressione;
use App\Models\Personality;
use App\Models\Personalyear;
use App\Models\Triade;
use Illuminate\Support\Arr;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Shared\Html;
use PhpOffice\PhpWord\Style\Language;
use PhpOffice\PhpWord\TemplateProcessor;

class Thesis
{
    /**
     * @var MatrixResource
     */
    public $matrix;

    public $now_time;

    /**
     * @var TemplateProcessor
     */
    public $templateProcessor;

    public $dir;

    public $analizzare;

    public $numero_espressione;

    public function __construct()
    {
        $this->matrix = new Matrix;
        $this->now_time = now();
        $this->dir = plugin_dir_path( __DIR__ );
        $this->templateProcessor = new TemplateProcessor($this->dir.'templates/template_word.docx');
        $this->analizzare = array();
    }
    public function create($customer){
        $this->matrix->getAllValues($customer);
        $this->matrix->get_summs();
        $this->matrix->get_matrix();
        $this->numero_espressione = $this->matrix->sums->sum_vowel_unvowel["numero_espressione"];
        //imposto il nome del file
        $fileName = $customer->id.'_'.$customer->name.'_'.$customer->lastname.'.docx';

        $this->theme_init_information($customer);

        $this->analisi_numero_espressione();

        $this->analisi_radice_generativa_epf();
        $this->analisi_radice_generativa_epe();
        $this->analisi_radice_generativa_epm();

        $this->valutazione_griglia_dinamica();

        $this->lezione_karmica();

        $this->analisi_anno_personale($customer["birthday"]);

        $this->analisi_triadi();
        //salvo il mio documento appena creato
        $this->templateProcessor->saveAs(NMRL_DIR."public/storage/files/$fileName");

        return [
            'url' => "public/storage/files/$fileName",
            'name_file' => $fileName
        ];
    }

    public function theme_init_information($customer)
    {
        $this->templateProcessor->setValue('name', ucfirst($customer->name));
        $this->templateProcessor->setValue('lastname', ucfirst($customer->lastname));
        $this->templateProcessor->setValue('birthday', $customer->birthday);
        $this->templateProcessor->setValue('numero_espressione', $this->numero_espressione);

        $this->templateProcessor->setValue('sum_f', $this->matrix->sums->sum_vowel_unvowel["sum_f"]);
        $this->templateProcessor->setValue('sum_e', $this->matrix->sums->sum_vowel_unvowel["sum_e"]);
        $this->templateProcessor->setValue('sum_m', $this->matrix->sums->sum_vowel_unvowel["sum_m"]);

        $this->templateProcessor->setValue('vowel_sum_f', $this->matrix->sums->vowel["sum_f"]);
        $this->templateProcessor->setValue('unvowel_sum_f', $this->matrix->sums->unvowel["sum_f"]);

        $this->templateProcessor->setValue('vowel_sum_e', $this->matrix->sums->vowel["sum_e"]);
        $this->templateProcessor->setValue('unvowel_sum_e', $this->matrix->sums->unvowel["sum_e"]);

        $this->templateProcessor->setValue('vowel_sum_m', $this->matrix->sums->vowel["sum_m"]);
        $this->templateProcessor->setValue('unvowel_sum_m', $this->matrix->sums->unvowel["sum_m"]);
    }

    public function analisi_numero_espressione()
    {
        $contents_espressione    =   Numeroespressione::where("numero_ref", $this->matrix->sums->sum_vowel_unvowel["numero_espressione"])->get();
        $content_espressione = $contents_espressione->random();

        $this->templateProcessor->setValue('content_espressione', $content_espressione->descrizione);

        $contents_num_espressione = Numeroespressione::where("numero_ref",$this->matrix->sums->sum_vowel_unvowel["numero_espressione"])->get();
        $content_num_espressione = $contents_num_espressione->random();

        $this->templateProcessor->setValue('content_num_espressione_luce', $content_num_espressione->descrizione_luce);
        $this->templateProcessor->setValue('content_num_espressione_ombra', $content_num_espressione->descrizione_ombra);
        $this->templateProcessor->setValue('content_num_espressione_ipo', $content_num_espressione->trappole_ipo);
        $this->templateProcessor->setValue('content_num_espressione_iper', $content_num_espressione->trappole_iper);
    }

    public function analisi_radice_generativa_epf()
    {
        $sum_split = str_split($this->matrix->sums->sum_vowel_unvowel["sum_f"]);
        $replacements = array();
        $replacements_done = array();
        $derived_sum_vowel = $this->matrix->sums->vowel["dev_sum_m_two"];
        $derived_sum_unvowel = $this->matrix->sums->unvowel["dev_sum_f_two"];
        foreach($sum_split as $sp)
        {
            if($sp != $this->numero_espressione && $sp != 0)
            {
                $contenuto = Numeroespressione::where('numero_ref', $sp)->inRandomOrder()->first();
                array_push($replacements,
                    [
                        'analizzare_p_f' => $sp,
                        'content_analizzare_luce_f' => $contenuto->descrizione_luce ,
                        'content_analizzare_ombra_f' => $contenuto->descrizione_ombra ,
                        'content_analizzare_ipo_f' => $contenuto->trappole_ipo,
                        'content_analizzare_iper_f' => $contenuto->trappole_iper,
                    ]
                );
                array_push($this->analizzare, $sp);
            }
        }

        if (intval($this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_f"])) > 9)
        {
            $prima_parte = $this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_f"]);
            $prima_parte_split = str_split($prima_parte);
            foreach($prima_parte_split as $sp)
            {
                if($sp != $this->numero_espressione && $sp != 0)
                {
                    $contenuto = Numeroespressione::where('numero_ref', $sp)->inRandomOrder()->first();
                    array_push($replacements, [
                        'analizzare_p_f' => $sp,
                        'content_analizzare_luce_f' => $contenuto->descrizione_luce ,
                        'content_analizzare_ombra_f' => $contenuto->descrizione_ombra ,
                        'content_analizzare_ipo_f' => $contenuto->trappole_ipo,
                        'content_analizzare_iper_f' => $contenuto->trappole_iper,
                    ]);
                    array_push($this->analizzare, $sp);
                }
            }
            $seconda_parte = $this->matrix->derived_sum($this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_f"]));

            $this->templateProcessor->setValue('dev_sum_f', $prima_parte.'/'.$seconda_parte);
        }
        else
        {
            $this->templateProcessor->setValue('dev_sum_f', $this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_f"]));
        }

        //anima
        $contents_anima = Anima::where('numero_ref', $derived_sum_vowel)->get();
        $content_anima = $contents_anima->random();
        $this->templateProcessor->setValue('numero_anima', $derived_sum_vowel);
        $this->templateProcessor->setValue('content_anima', $content_anima->descrizione_luce);

        //personalita
        $contens_personalita = Personality::where('numero_ref', $derived_sum_unvowel)->get();
        $content_personalita = $contens_personalita->random();
        $this->templateProcessor->setValue('numero_personalita', $derived_sum_unvowel);
        $this->templateProcessor->setValue('content_personalita', $content_personalita->descrizione_luce);

        $this->templateProcessor->cloneBlock('block_epf_riptezione', 0, true, false, $replacements);

    }

    public function analisi_radice_generativa_epe()
    {
        $sum_split = str_split($this->matrix->sums->sum_vowel_unvowel["sum_e"]);
        $replacements = array();

        foreach($sum_split as $sp)
        {
            if($sp != $this->numero_espressione && !in_array($sp, $this->analizzare))
            {
                $contenuto = Numeroespressione::where('numero_ref', $sp)->inRandomOrder()->first();
                array_push($replacements,
                    [
                        'numero_analizzare' => $sp,
                        'content_luce_e' => $contenuto->descrizione_luce ,
                        'content_ombra_e' => $contenuto->descrizione_ombra ,
                        'content_ipo_e' => $contenuto->trappole_ipo,
                        'content_iper_e' => $contenuto->trappole_iper
                    ]
                );
                array_push($this->analizzare, $sp);
            }
        }


        if (intval($this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_e"])) > 9)
        {
            $this->templateProcessor->setValue('dev_sum_e', $this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_e"]).'/'.$this->matrix->derived_sum($this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_e"])));
        }
        else
        {
            $this->templateProcessor->setValue('dev_sum_e', $this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_e"]));
        }

        //salva
        $this->templateProcessor->cloneBlock('block_ripetizione', 0, true, false, $replacements);
    }

    public function analisi_radice_generativa_epm()
    {
        $sum_split = str_split($this->matrix->sums->sum_vowel_unvowel["sum_m"]);
        $replacements = array();

        foreach($sum_split as $sp)
        {
            if($sp != $this->numero_espressione && !in_array($sp, $this->analizzare))
            {
                $contenuto = Numeroespressione::where('numero_ref', $sp)->inRandomOrder()->first();
                array_push($replacements,
                    [
                        'num_m_analizzare' => $sp,
                        'content_luce_m' => $contenuto->descrizione_luce ,
                        'content_ombra_m' => $contenuto->descrizione_ombra ,
                        'content_ipo_m' => $contenuto->trappole_ipo,
                        'content_iper_m' => $contenuto->trappole_iper
                    ]
                );
                array_push($this->analizzare, $sp);
            }
        }

        $sum_vowel_unvowel = $this->matrix->sums->sum_vowel_unvowel["sum_m"];
        if (intval($this->matrix->derived_sum($sum_vowel_unvowel)) > 9)
        {
            $dev_sum_m = $this->matrix->derived_sum($sum_vowel_unvowel).'/'.$this->matrix->derived_sum($this->matrix->derived_sum($sum_vowel_unvowel));
        }
        else
        {
            $dev_sum_m = $this->matrix->derived_sum($sum_vowel_unvowel);
        }
        $this->templateProcessor->setValue('dev_sum_m', $dev_sum_m);
        //salva
        $this->templateProcessor->cloneBlock('block_pmentale', 0, true, false, $replacements);
    }

    public function valutazione_griglia_dinamica()
    {
        $content_1  =   Griglia::where('count_number', $this->matrix->matrix->tabella[1]["count"])->where('numero_ref', '1')->inRandomOrder()->first();
        $content_2  =   Griglia::where('count_number', $this->matrix->matrix->tabella[2]["count"])->where('numero_ref', '2')->inRandomOrder()->first();
        $content_3  =   Griglia::where('count_number', $this->matrix->matrix->tabella[3]["count"])->where('numero_ref', '3')->inRandomOrder()->first();
        $content_4  =   Griglia::where('count_number', $this->matrix->matrix->tabella[4]["count"])->where('numero_ref', '4')->inRandomOrder()->first();
        $content_5  =   Griglia::where('count_number', $this->matrix->matrix->tabella[5]["count"])->where('numero_ref', '5')->inRandomOrder()->first();
        $content_6  =   Griglia::where('count_number', $this->matrix->matrix->tabella[6]["count"])->where('numero_ref', '6')->inRandomOrder()->first();
        $content_7  =   Griglia::where('count_number', $this->matrix->matrix->tabella[7]["count"])->where('numero_ref', '7')->inRandomOrder()->first();
        $content_8  =   Griglia::where('count_number', $this->matrix->matrix->tabella[8]["count"])->where('numero_ref', '8')->inRandomOrder()->first();
        $content_9  =   Griglia::where('count_number', $this->matrix->matrix->tabella[9]["count"])->where('numero_ref', '9')->inRandomOrder()->first();
        $this->templateProcessor->setValues([
            'count_1'   => $this->matrix->matrix->tabella[1]["count"],
            'count_2'   => $this->matrix->matrix->tabella[2]["count"],
            'count_3'   => $this->matrix->matrix->tabella[3]["count"],
            'count_4'   => $this->matrix->matrix->tabella[4]["count"],
            'count_5'   => $this->matrix->matrix->tabella[5]["count"],
            'count_6'   => $this->matrix->matrix->tabella[6]["count"],
            'count_7'   => $this->matrix->matrix->tabella[7]["count"],
            'count_8'   => $this->matrix->matrix->tabella[8]["count"],
            'count_9'   => $this->matrix->matrix->tabella[9]["count"],
            'content_count_1'   => $content_1->descrizione,
            'content_count_2'   => $content_2->descrizione,
            'content_count_3'   => $content_3->descrizione,
            'content_count_4'   => $content_4->descrizione,
            'content_count_5'   => $content_5->descrizione,
            'content_count_6'   => $content_6->descrizione,
            'content_count_7'   => $content_7->descrizione,
            'content_count_8'   => $content_8->descrizione,
            'content_count_9'   => $content_9->descrizione
        ]);
        $replacements = array();
        $lunghezza_array_percentuali = count($this->matrix->matrix->equivalent_percentage);
        if($lunghezza_array_percentuali % 2 == 0)
        {
            $meta_key = ceil($lunghezza_array_percentuali / 2);
        }
        else
        {
            $meta_key = ceil($lunghezza_array_percentuali / 2) - 1;
        }
        $replacements_analisi = array();

        $caselle_equilibrio = $this->matrix->matrix->equivalent_percentage[$meta_key]['caselle'];
        $percentuale_equilibrio = $this->matrix->matrix->equivalent_percentage[$meta_key]['percentuale'];
        $analisiGriglia = "$caselle_equilibrio in equilibrio con un riempimento in media percentuale di $percentuale_equilibrio %";
        array_push($replacements_analisi, [
            'analisi_griglia'   => $analisiGriglia
        ]);
        $i = $meta_key + 1;
        while($i < $lunghezza_array_percentuali)
        {
            $caselle = $this->matrix->matrix->equivalent_percentage[$i]['caselle'];
            $percentuale = $this->matrix->matrix->equivalent_percentage[$i]['percentuale'];
            $analisiGriglia = "$caselle in iper con un riempimento al di sopra della media percentuale di $percentuale %";
            array_push($replacements_analisi, [
                'analisi_griglia'   => $analisiGriglia
            ]);
            //analisi per caselle e contenuto
            $caselle_arr = explode('-', $caselle);
            foreach ($caselle_arr as $casella) {
                $analisi_contenuto_studio = CasellaGrigliaPercentuale::where('num_ref', $casella)->first();
                array_push($replacements, [
                    'tipo_condizione'   =>  'Iper',
                    'casella_ref'   =>  $casella,
                    'analisi_casella'   => $analisi_contenuto_studio->iper
                ]);
            }

            $i++;
        }
        $i = $meta_key - 1;
        while(0 <= $i)
        {
            $caselle = $this->matrix->matrix->equivalent_percentage[$i]['caselle'];
            $percentuale = $this->matrix->matrix->equivalent_percentage[$i]['percentuale'];
            if($percentuale != 0)
            {
                $analisiGriglia = "$caselle in ipo con un riempimento al di sotto della media percentuale $percentuale %";
                array_push($replacements_analisi, [
                    'analisi_griglia'   => $analisiGriglia
                ]);
                //analisi per caselle e contenuto
                $caselle_arr = explode('-', $caselle);
                foreach ($caselle_arr as $casella) {
                    $analisi_contenuto_studio = CasellaGrigliaPercentuale::where('num_ref', $casella)->first();
                    array_push($replacements, [
                        'tipo_condizione'   =>  'Ipo',
                        'casella_ref'   =>  $casella,
                        'analisi_casella'   => $analisi_contenuto_studio->ipo,
                    ]);
                }
            }
            $i--;
        }
        //salva
        $this->templateProcessor->cloneBlock('block_analisigriglia', 0, true, false, $replacements_analisi);
        $this->templateProcessor->cloneBlock('block_analisicasella', 0, true, false, $replacements);
    }


    public function lezione_karmica()
    {
        $keys_karmico = array();
        foreach($this->matrix->matrix->tabella as $key => $tabella)
        {
            if ($tabella["count"] == 0)
            {
                array_push($keys_karmico, $key);
            }
        }

        $replacements = array();
        foreach($keys_karmico as $numero_karmico)
        {
                $content = Lezionekarmica::where('number_value', $numero_karmico)->inRandomOrder()->first();

                array_push($replacements,
                    [
                        'numero_karmico' => $numero_karmico,
                        'content_karmico' => $content->descrizione,
                    ]
                );
        }
        //inserisco i dati karmici
        $this->templateProcessor->cloneBlock('block_karmico', 0, true, false, $replacements);
    }

    public function analisi_anno_personale($compleanno)
    {
        //Descrizione anno personale
        $birthday = explode("-", $compleanno);
        $anno_personale = $this->anno_personale($birthday);
        $anno_personale_content = Personalyear::where('anno_ref', $anno_personale)->first();
        $this->templateProcessor->setValue("numero_dev_anno", strval($anno_personale));
        $this->templateProcessor->setValue("content_numero_anno", $anno_personale_content->descrizione);
    }

    public function analisi_triadi()
    {
        $triadi = $this->matrix->matrix->triadi;
        $replacements = array();
        foreach ($triadi as $caselle => $value) {
            if($value)
            {
                $analisi_triadi_contenuto = Triade::where('num_ref', $caselle)->get()->first();
                array_push($replacements, [
                    'title_triade'  => $analisi_triadi_contenuto->title,
                    'num_ref_triade'    => $analisi_triadi_contenuto->num_ref,
                    'triade_content'    => $analisi_triadi_contenuto->descrizione
                ]);
            }
        }
        $this->templateProcessor->cloneBlock('block_triade', 0, true, false, $replacements);
    }


    /**
     *
     *  OTHER FUNCTIONS
     *
     */
    public function anno_personale($birthday)
    {
        $anno = Date("Y");
        $mese = $birthday[1];
        $day = $birthday[2];

        $d_anno = $this->derived_sum_ridotta($anno);
        $d_mese = $this->derived_sum_ridotta($mese);
        $d_day = $this->derived_sum_ridotta($day);

        return $this->derived_sum_ridotta($d_anno + $d_mese + $d_day);

    }

    public function derived_sum_ridotta($num)
    {
        $d_num = $this->matrix->derived_sum($num);
        if($d_num > 9)
        {
            $this->derived_sum_ridotta($d_num);
        }

        return $d_num;
    }

    public function get_derived(& $derived)
    {
        while($derived > 9)
            {
                $derived = $this->matrix->derived_sum($derived);
            }
    }

    public function create_graphs()
    {

    }
}
