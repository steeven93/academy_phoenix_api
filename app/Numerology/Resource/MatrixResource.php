<?php
namespace App\Numerology\Resource;
use App\Models\AlfabetValue;
use Illuminate\Support\Facades\DB;

/**
* @var $char              ->  è il carattere
* @var $value_f           ->  valore piano fisico
* @var $value_e           ->  valore piano emozionale
* @var $value_m           ->  valore piano mentale
* @var $vowel             ->  vocale
* @var $vowel             ->  Non vocale
* @var $sum_f             ->  sommatoria di tutti i valori del piano fisico in base a @vowel
* @var $sum_e             ->  sommatoria di tutti i valori del piano emozionale in base a @vowel
* @var $sum_m             ->  sommatoria di tutti i valori del piano mentale in base a @vowel
* @var $dev_sum_f_*       ->  è la derivazione ossia la sommatoria dei numeri che compongono @sum_*
* @var $sum_vowel_unvowel ->  è la somma della sommatoria  di un piano (fisico , emozionale o mentale) @vowel e @unvowel
* @var $sum_dev_one_f     -> è la somma della prima derivazione del piano fisico @vowel con la prima derivazione del piano fisico @unvowel
**/

class MatrixResource {

    public $table_of_name_values;
    public $sums;
    public $matrix;

    /**
     * Questa funzione deve essere la prima a partire
     * mi restituisce un array()
     * mi restituisce per ogni carattere il suo valore derivante dal (Piano fisico, emozionale e mentale) suddiviso in @vowel e @unvowel
     */
    Public function getAllValues($customer){
        /**
         * @var $name_string_array type array()
         * @var $lastname_string_array type array()
         */
        $name_string_array = str_split(strtoupper($customer->name));
        $lastname_string_array = str_split(strtoupper($customer->lastname));
        $empty = [
            'value_f'   =>  "",
            'value_e'   =>  "",
            'value_m'   =>  "",
            'char'      =>  ""
        ];
        $table_of_name_values =  [
            "vowel"     =>  [],
            "unvowel"   =>  []
        ];
        // mi riempe le variabili
        array_push($table_of_name_values["vowel"], $this->set_value_of_name($name_string_array, true), $empty, $this->set_value_of_name($lastname_string_array, true));
        array_push($table_of_name_values["unvowel"], $this->set_value_of_name($name_string_array), $empty, $this->set_value_of_name($lastname_string_array));

        $this->table_of_name_values = (object) $table_of_name_values;
        return (object) $table_of_name_values;
    }

    /**
     * OTTIENI TUTTE LE SOMME E LE SUE DERIVAZIONI E IL @NUMERO_ESPRESSIONE
     */
    Public function get_summs(){

        $table_of_name_values = $this->table_of_name_values;

        //struttura risultato
        $result = [
            "vowel"             =>  [
                    "sum_f"             =>  0,
                    "sum_e"             =>  0,
                    "sum_m"             =>  0,
                    "dev_sum_f_one"     =>  0,
                    "dev_sum_e_one"     =>  0,
                    "dev_sum_m_one"     =>  0,
                    "dev_sum_f_two"     =>  0,
                    "dev_sum_e_two"     =>  0,
                    "dev_sum_m_two"     =>  0
            ],
            "unvowel"           =>  [
                "sum_f"                 =>  0,
                "sum_e"                 =>  0,
                "sum_m"                 =>  0,
                "dev_sum_f_one"         =>  0,
                "dev_sum_e_one"         =>  0,
                "dev_sum_m_one"         =>  0,
                "dev_sum_f_two"         =>  0,
                "dev_sum_e_two"         =>  0,
                "dev_sum_m_two"         =>  0
            ],
            "sum_vowel_unvowel" =>  [
                "sum_f"                 =>  0,
                "sum_e"                 =>  0,
                "sum_m"                 =>  0,
                "dev_sum_f"             =>  0,
                "dev_sum_e"             =>  0,
                "dev_sum_m"             =>  0,
                "sum_dev_one_f"           =>  0,
                "numero_espressione"    =>  0
            ]
        ];

        /*
        * AGGIUNTA DELLE SOMME DI TUTTI VALORE LETTERALI IN BASE ALLE VOCALI E NONVOCALI
        */

        //sommatoria dei valori appartenenti alle vocali
        foreach($table_of_name_values->vowel[0] as $name)
        {
            $result["vowel"]["sum_f"]   =   $result["vowel"]["sum_f"] + intval($name["value_f"]);
            $result["vowel"]["sum_e"]   =   $result["vowel"]["sum_e"] + intval($name["value_e"]);
            $result["vowel"]["sum_m"]   =   $result["vowel"]["sum_m"] + intval($name["value_m"]);
        }
        foreach($table_of_name_values->vowel[2] as $lastname)
        {
            $result["vowel"]["sum_f"]   =   $result["vowel"]["sum_f"] + intval($lastname["value_f"]);
            $result["vowel"]["sum_e"]   =   $result["vowel"]["sum_e"] + intval($lastname["value_e"]);
            $result["vowel"]["sum_m"]   =   $result["vowel"]["sum_m"] + intval($lastname["value_m"]);
        }

        //sommatoria dei valori appartenenti alle nonvocali
        foreach($table_of_name_values->unvowel[0] as $name)
        {
            $result["unvowel"]["sum_f"]   =   $result["unvowel"]["sum_f"] + intval($name["value_f"]);
            $result["unvowel"]["sum_e"]   =   $result["unvowel"]["sum_e"] + intval($name["value_e"]);
            $result["unvowel"]["sum_m"]   =   $result["unvowel"]["sum_m"] + intval($name["value_m"]);
        }
        foreach($table_of_name_values->unvowel[2] as $lastname)
        {
            $result["unvowel"]["sum_f"]   =   $result["unvowel"]["sum_f"] + intval($lastname["value_f"]);
            $result["unvowel"]["sum_e"]   =   $result["unvowel"]["sum_e"] + intval($lastname["value_e"]);
            $result["unvowel"]["sum_m"]   =   $result["unvowel"]["sum_m"] + intval($lastname["value_m"]);
        }

        /*
        * AGGIUNTA DERIVAZIONE
        */
        //vocali
        $result["vowel"]["dev_sum_f_one"]   = $this->derived_sum($result["vowel"]["sum_f"]);
        $result["vowel"]["dev_sum_e_one"]   = $this->derived_sum($result["vowel"]["sum_e"]);
        $result["vowel"]["dev_sum_m_one"]   = $this->derived_sum($result["vowel"]["sum_m"]);

        $result["vowel"]["dev_sum_f_two"]   = $this->derived_sum($result["vowel"]["dev_sum_f_one"]);
        $result["vowel"]["dev_sum_e_two"]   = $this->derived_sum($result["vowel"]["dev_sum_e_one"]);
        $result["vowel"]["dev_sum_m_two"]   = $this->derived_sum($result["vowel"]["dev_sum_m_one"]);

        //nonvocali
        $result["unvowel"]["dev_sum_f_one"]   = $this->derived_sum($result["unvowel"]["sum_f"]);
        $result["unvowel"]["dev_sum_e_one"]   = $this->derived_sum($result["unvowel"]["sum_e"]);
        $result["unvowel"]["dev_sum_m_one"]   = $this->derived_sum($result["unvowel"]["sum_m"]);

        $result["unvowel"]["dev_sum_f_two"]   = $this->derived_sum($result["unvowel"]["dev_sum_f_one"]);
        $result["unvowel"]["dev_sum_e_two"]   = $this->derived_sum($result["unvowel"]["dev_sum_e_one"]);
        $result["unvowel"]["dev_sum_m_two"]   = $this->derived_sum($result["unvowel"]["dev_sum_m_one"]);

        /**
         * AGGIUNTA DELLE SOMMATORIE VOWEL E UNVOWEL
         */

         $result["sum_vowel_unvowel"]["sum_f"]  =   $result["vowel"]["sum_f"] + $result["unvowel"]["sum_f"];
         $result["sum_vowel_unvowel"]["sum_e"]  =   $result["vowel"]["sum_e"] + $result["unvowel"]["sum_e"];
         $result["sum_vowel_unvowel"]["sum_m"]  =   $result["vowel"]["sum_m"] + $result["unvowel"]["sum_m"];

         //AGGOIUNTA DERIVAZONE DELLE SOMMATORIE VOWEL E UNVOWEL
         $result["sum_vowel_unvowel"]["dev_sum_f"]  =   $this->derived_sum($result["sum_vowel_unvowel"]["sum_f"]);
         $result["sum_vowel_unvowel"]["dev_sum_e"]  =   $this->derived_sum($result["sum_vowel_unvowel"]["sum_e"]);
         $result["sum_vowel_unvowel"]["dev_sum_m"]  =   $this->derived_sum($result["sum_vowel_unvowel"]["sum_m"]);

         // CALCOLO NUMERO ESPRESSIONE
         $result["sum_vowel_unvowel"]["sum_dev_one_f"]        = $result["vowel"]["dev_sum_f_one"] + $result["unvowel"]["dev_sum_f_one"];
         $result["sum_vowel_unvowel"]["numero_espressione"] =   $this->derived_sum($result["sum_vowel_unvowel"]["sum_dev_one_f"]);


         $this->sums = (object) $result;

         return (object) $result;
    }


    /**
     * Questo metodo mi serve per creare un array con i dati da riempire per la @matrix
     */

    Public function get_matrix()
    {
        //struttura risultato
        $result = [
            "tabella"   =>  [
                1   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                2   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                3   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                4   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                5   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                6   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                7   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                8   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ],
                9   => [
                    "count"         =>  0,
                    "percentage"    =>  0
                ]
            ],
            "triadi"  =>  [
                "3-6-9" =>  false,
                "2-5-8" =>  false,
                "1-4-7" => false,
                "1-2-3"   =>  false,
                "4-5-6"   =>  false,
                "7-8-9"   =>  false,
                "1-5-9"   =>  false,
                "3-5-7"   =>  false,
            ],
            "equivalent_percentage" => array(),
            "NL"                    =>  0
        ];

        $values_f = $this->count_number_piano_values("value_f");


        foreach($values_f as $value){
            $result["NL"]   =   $result["NL"]   +   $value;
        }

        foreach($values_f as $key => $value){
            $result["tabella"][$key]["count"]       =   $value;
            $result["tabella"][$key]["percentage"]  =   $this->get_percentage($value,$result["NL"]);
        }

        foreach($result["triadi"] as $possibile_triade => $value)
        {
            $result["triadi"][$possibile_triade]  =   $this->check_triade($possibile_triade, $result);
        }

        $this->check_percentuali_triadi($result);

        //salvo il risultato nella mia variabile globale @matrix
        $this->matrix = (object) $result;
        return (object) $result;
    }
    public function check_triade($triade, $griglia)
    {
        $tr = explode('-', $triade);
        foreach ($tr as $casella) {
            if ($griglia["tabella"][$casella]["count"] == 0)
            {
                return false;
            }
        }

        return true;
    }

    public function check_percentuali_triadi( & $griglia)
    {
        $arr = array();
        $output = array();
        foreach( $griglia['tabella'] as $casella => $value )
        {
            if(empty($arr[$value["percentage"]]))
            {
                $arr[$value["percentage"]] = array();
            }
            array_push($arr[$value["percentage"]], $casella);
        }
        ksort($arr, SORT_NUMERIC);

        foreach ($arr as $key => $value) {
            array_push($output, [
                'percentuale'   => $key,
                'caselle' => implode('-', $value),
            ]);
        }

        $griglia['equivalent_percentage'] = $output;
    }

    /*
    * Questa funzione mi prende l'array del nome o cognome e mi sistema il valore
    * @ $isvowel valore di default false
    * la funzione ritorna un @Array Type
    */
    Public function set_value_of_name($name, $isvowel = false){
        //mi preparo la mia variable
        $result = [];


        /** mi scansiono l'array @var $name */
        foreach ($name as $character) {

            /** assegno il risultato della richiesta ad @var $alfabetValue che sarà un array */
            $alfabetValue = AlfabetValue::where('char', $character)->where('alfabet_id', '1')->get()->first();
            $informations = $alfabetValue;
                //mi chiedo se c'è uno spazio perché è possibile che una persona abbia due nomi o cognomi
                if($character != " ")
                {
                    //guardo se è una vocale oppure no
                    if ($this->is_vowel($informations->char) == $isvowel)
                    {
                        //imposto i miei risultati
                        array_push($result, [
                            'value_f'   =>  $informations->value_f,
                            'value_e'   =>  $informations->value_e,
                            'value_m'   =>  $informations->value_m,
                            'char'      =>  $informations->char
                        ]);
                    }
                    else
                    {
                        //imposto i miei risultati
                        array_push($result, [
                            'value_f'   =>  "",
                            'value_e'   =>  "",
                            'value_m'   =>  "",
                            'char'      =>  $informations->char
                        ]);
                    }
                }
                else
                {
                    //altrimento è semplicemente uno spazio e va lasciato vuoto
                    array_push($result, [
                        'value_f'   =>  "",
                        'value_e'   =>  "",
                        'value_m'   =>  "",
                        'char'      =>  ""
                    ]);
                }

        }
        return $result;
    }


    /**
     * Questa funzione mi somma un numero ad esempio 40 fa 4 oppure 41 fa 5
     */
    Public  function derived_sum($number)
    {
        $temp = str_split($number);
        $somma = 0;
        foreach ($temp as $t) {
            $somma = $somma + $t;
        }
        //restituisce un intero
        return $somma;
    }

    /**
     * Questo metodo mi controlla se è una vocale
     */
    public function is_vowel($valore)
    {
        $valore = strtolower($valore);
        if (($valore == "a")|| ($valore == "e") || ($valore == "i") || ($valore == "o") || ($valore == "u"))
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public  function get_percentage($value, $nl)
    {
        return number_format(($value*100)/$nl, 2);
    }



    /**
     * Questo metodo mi conta quanti numeri si ripetono in un piano sia @vowel che @unvowel
     *
     *
     */
    public function count_number_piano_values($key)
    {
        $result = [];

        $this->scan_and_get($result,"vowel",$key,0);
        $this->scan_and_get($result,"vowel",$key,2);
        $this->scan_and_get($result,"unvowel",$key,0);
        $this->scan_and_get($result,"unvowel",$key,2);
        $result = array_count_values($result);
        ksort($result);

        return $result;
    }


    /**
     * @where indica dove se vowel oppure no
     * @key la chiave di accesso al valore
     * $int 0 perché sia il nome o 2 per il cognome
     */
    public function scan_and_get(&$result, $where, $key, $int){

        $table_of_name_values = $this->table_of_name_values;

        if ($where == "vowel")
        {
            //passo tutto l'array @vowel
            foreach($table_of_name_values->vowel[$int] as $value)
            {
                //verifico che il valore con chiave $key non sia vuoto
                if($value[$key] != "")
                {
                    //se non è vuoto allora me lo salvo nell'array
                    array_push($result,  $value[$key]);
                }
            }

        }
        if ($where == "unvowel")
        {
            //passo tutto l'array @vowel
            foreach($table_of_name_values->unvowel[$int] as $value)
            {
                //verifico che il valore con chiave $key non sia vuoto
                if($value[$key] != "")
                {
                    //se non è vuoto allora me lo salvo nell'array
                    array_push($result,  $value[$key]);
                }
            }

        }
    }

    public function derivation_birthday($customer)
    {
        // $customer->birthday
    }

}
