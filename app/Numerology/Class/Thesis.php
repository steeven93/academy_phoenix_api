<?php

namespace App\Numerology\Class;

use App\Models\Anima;
use App\Models\Grill;
use App\Models\GrillBox;
use App\Models\KarmicLesson;
use App\Models\Number;
use App\Models\Numeroespressione;
use App\Models\Personality;
use App\Models\Personalyear;
use App\Models\Triad;
use App\Numerology\Resource\MatrixResource;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
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

    public $analyze;

    public $expression_number;

    public function __construct()
    {
        $this->matrix = new MatrixResource;
        $this->now_time = now();
        $this->templateProcessor = new TemplateProcessor(Storage::disk('templates')->path('template_word.docx'));
        $this->analyze = array();
    }

    public function create($customer){
        $this->matrix->getAllValues($customer);
        $this->matrix->get_summs();
        $this->matrix->get_matrix();
        $this->expression_number = $this->matrix->sums->sum_vowel_unvowel["numero_espressione"];
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
        $path_file = Storage::disk('files')->path($fileName);
        $this->templateProcessor->saveAs($path_file);

        $file_stream = file_get_contents($path_file);

        Storage::disk('files')->delete($fileName);

        return [
            'file_stream'   => $file_stream,
            'file_name' => $fileName,

        ];
    }

    public function theme_init_information($customer)
    {
        $this->templateProcessor->setValue('name', ucfirst($customer->name));
        $this->templateProcessor->setValue('lastname', ucfirst($customer->lastname));
        $this->templateProcessor->setValue('birthday', $customer->birthday);
        $this->templateProcessor->setValue('numero_espressione', $this->expression_number);

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
        $content_espressione    =   ExpressionNumber::getExpressionNumberDefault($this->matrix->sums->sum_vowel_unvowel["numero_espressione"])->get();

        $this->templateProcessor->setValue('content_espressione', $content_espressione->description);

        $content_num_espressione = ExpressionNumber::getExpressionNumberExpression($this->matrix->sums->sum_vowel_unvowel["numero_espressione"])->get();

        $this->templateProcessor->setValue('content_num_espressione_luce', $content_num_espressione->content_light);
        $this->templateProcessor->setValue('content_num_espressione_ombra', $content_num_espressione->content_shadow);
        $this->templateProcessor->setValue('content_num_espressione_ipo', $content_num_espressione->ipo);
        $this->templateProcessor->setValue('content_num_espressione_iper', $content_num_espressione->iper);
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
            if($sp != $this->expression_number && $sp != 0)
            {
                $contenuto = ExpressionNumber::getExpressionNumberExpression($sp)->first();
                array_push($replacements,
                    [
                        'analizzare_p_f' => $sp,
                        'content_analizzare_luce_f' => $contenuto->content_light ,
                        'content_analizzare_ombra_f' => $contenuto->content_shadow ,
                        'content_analizzare_ipo_f' => $contenuto->ipo,
                        'content_analizzare_iper_f' => $contenuto->iper,
                    ]
                );
                array_push($this->analyze, $sp);
            }
        }

        if (intval($this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_f"])) > 9)
        {
            $prima_parte = $this->matrix->derived_sum($this->matrix->sums->sum_vowel_unvowel["sum_f"]);
            $prima_parte_split = str_split($prima_parte);
            foreach($prima_parte_split as $sp)
            {
                if($sp != $this->expression_number && $sp != 0)
                {
                    $contenuto = ExpressionNumber::getExpressionNumberExpression($sp)->first();
                    array_push($replacements, [
                        'analizzare_p_f' => $sp,
                        'content_analizzare_luce_f' => $contenuto->content_light ,
                        'content_analizzare_ombra_f' => $contenuto->content_shadow ,
                        'content_analizzare_ipo_f' => $contenuto->ipo,
                        'content_analizzare_iper_f' => $contenuto->iper,
                    ]);
                    array_push($this->analyze, $sp);
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
        $content_anima = ExpressionNumber::getExpressionNumberSoul($derived_sum_vowel)->first();
        $this->templateProcessor->setValue('numero_anima', $derived_sum_vowel);
        $this->templateProcessor->setValue('content_anima', $content_anima->content);

        //personalita
        $content_personalita = ExpressionNumber::getExpressionNumberPersonality($derived_sum_unvowel)->first();
        $this->templateProcessor->setValue('numero_personalita', $derived_sum_unvowel);
        $this->templateProcessor->setValue('content_personalita', $content_personalita->content);

        $this->templateProcessor->cloneBlock('block_epf_riptezione', 0, true, false, $replacements);

    }

    public function analisi_radice_generativa_epe()
    {
        $sum_split = str_split($this->matrix->sums->sum_vowel_unvowel["sum_e"]);
        $replacements = array();

        foreach($sum_split as $sp)
        {
            if($sp != $this->expression_number && !in_array($sp, $this->analyze))
            {
                $contenuto = ExpressionNumber::getExpressionNumberExpression($sp)->first();
                array_push($replacements,
                    [
                        'numero_analizzare' => $sp,
                        'content_luce_e' => $contenuto->content_light ,
                        'content_ombra_e' => $contenuto->content_shadow ,
                        'content_ipo_e' => $contenuto->ipo,
                        'content_iper_e' => $contenuto->iper
                    ]
                );
                array_push($this->analyze, $sp);
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
            if($sp != $this->expression_number && !in_array($sp, $this->analyze))
            {
                $contenuto = ExpressionNumber::getExpressionNumberExpression($sp)->first();
                array_push($replacements,
                    [
                        'num_m_analizzare' => $sp,
                        'content_luce_m' => $contenuto->content_light ,
                        'content_ombra_m' => $contenuto->content_shadow ,
                        'content_ipo_m' => $contenuto->ipo,
                        'content_iper_m' => $contenuto->iper
                    ]
                );
                array_push($this->analyze, $sp);
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
        $content_1  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[1]["count"], '1')->first();
        $content_2  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[2]["count"], '2')->first();
        $content_3  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[3]["count"], '3')->first();
        $content_4  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[4]["count"], '4')->first();
        $content_5  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[5]["count"], '5')->first();
        $content_6  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[6]["count"], '6')->first();
        $content_7  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[7]["count"], '7')->first();
        $content_8  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[8]["count"], '8')->first();
        $content_9  =   Grill::getSpecificGrill($this->matrix->matrix->tabella[9]["count"], '9')->first();
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
            'content_count_1'   => $content_1->description,
            'content_count_2'   => $content_2->description,
            'content_count_3'   => $content_3->description,
            'content_count_4'   => $content_4->description,
            'content_count_5'   => $content_5->description,
            'content_count_6'   => $content_6->description,
            'content_count_7'   => $content_7->description,
            'content_count_8'   => $content_8->description,
            'content_count_9'   => $content_9->description
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
        $analisiGrill = "$caselle_equilibrio in equilibrio con un riempimento in media percentuale di $percentuale_equilibrio %";
        array_push($replacements_analisi, [
            'analisi_griglia'   => $analisiGrill
        ]);
        $i = $meta_key + 1;
        while($i < $lunghezza_array_percentuali)
        {
            $caselle = $this->matrix->matrix->equivalent_percentage[$i]['caselle'];
            $percentuale = $this->matrix->matrix->equivalent_percentage[$i]['percentuale'];
            $analisiGrill = "$caselle in iper con un riempimento al di sopra della media percentuale di $percentuale %";
            array_push($replacements_analisi, [
                'analisi_griglia'   => $analisiGrill
            ]);
            //analisi per caselle e contenuto
            $caselle_arr = explode('-', $caselle);
            foreach ($caselle_arr as $casella) {
                $analisi_contenuto_studio = GrillBox::where('ref_number', $casella)->first();
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
                $analisiGrill = "$caselle in ipo con un riempimento al di sotto della media percentuale $percentuale %";
                array_push($replacements_analisi, [
                    'analisi_griglia'   => $analisiGrill
                ]);
                //analisi per caselle e contenuto
                $caselle_arr = explode('-', $caselle);
                foreach ($caselle_arr as $casella) {
                    $analisi_contenuto_studio = GrillBox::where('ref_number', $casella)->first();
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
                $content = KarmicLesson::where('ref_number', $numero_karmico)->inRandomOrder()->first();

                array_push($replacements,
                    [
                        'numero_karmico' => $numero_karmico,
                        'content_karmico' => $content->description,
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
        $anno_personale_content = Personalyear::where('ref_year', $anno_personale)->first();
        $this->templateProcessor->setValue("numero_dev_anno", strval($anno_personale));
        $this->templateProcessor->setValue("content_numero_anno", $anno_personale_content->description);
    }

    public function analisi_triadi()
    {
        $triadi = $this->matrix->matrix->triadi;
        $replacements = array();
        foreach ($triadi as $caselle => $value) {
            if($value)
            {
                $analisi_triadi_contenuto = Triad::where('ref_number', $caselle)->first();
                array_push($replacements, [
                    'title_triade'  => $analisi_triadi_contenuto->title,
                    'num_ref_triade'    => $analisi_triadi_contenuto->ref_number,
                    'triade_content'    => $analisi_triadi_contenuto->description
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
