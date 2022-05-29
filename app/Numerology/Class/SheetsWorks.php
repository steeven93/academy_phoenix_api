<?php
namespace App\Numerology\Class;

use App\Numerology\Resource\MatrixResource;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Reader\IReader;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\IWriter;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SheetsWorks
{

    public static function create($customer)
    {
        $matrix_name_cordinate = [
            "B", "C", "D","E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z", "AA", "AB", "AC", "AD", "AE", "AF"
        ];

        $matrix = New MatrixResource;
        $matrix->getAllValues($customer);
        $matrix->get_summs();
        $matrix->get_matrix();




        //nome del file finale del foglio di lavoro
        $fileName = $customer->id.'_'.$customer->name.'_'.$customer->lastname.'.xls';
        // dd(storage_path('public/templates/template_file.xlsx'));
        //prendo il template
        $spreadsheet = IOFactory::load(Storage::disk('templates')->path('template_file.xlsx'));
        $worksheet = $spreadsheet->getActiveSheet();

        //inserisco i dati creando la tabella con il nome
        foreach($matrix->table_of_name_values->vowel[0] as $key => $name)
        {
            $worksheet->getCell($matrix_name_cordinate[$key].'2')->setValue($name["value_m"]);
            $worksheet->getCell($matrix_name_cordinate[$key].'3')->setValue($name["value_e"]);
            $worksheet->getCell($matrix_name_cordinate[$key].'4')->setValue($name["value_f"]);
            $worksheet->getCell($matrix_name_cordinate[$key].'5')->setValue($name["char"]);

            $worksheet->getCell($matrix_name_cordinate[$key].'6')->setValue($matrix->table_of_name_values->unvowel[0][$key]["value_f"]);
            $worksheet->getCell($matrix_name_cordinate[$key].'7')->setValue($matrix->table_of_name_values->unvowel[0][$key]["value_e"]);
            $worksheet->getCell($matrix_name_cordinate[$key].'8')->setValue($matrix->table_of_name_values->unvowel[0][$key]["value_m"]);
        }

        //inserisco i dati creando la tabella con il  cognome
        foreach($matrix->table_of_name_values->vowel[2] as $key => $lastname)
        {
            //aggiungo uno spazio e passo al prossimo ecco perché aggiungo un 1 per passare alla prossima cella
            //perche la sezione nome è finita
            $pre = count($matrix->table_of_name_values->vowel[0]) + 1;

            $worksheet->getCell($matrix_name_cordinate[$key + $pre].'2')->setValue($lastname["value_m"]);
            $worksheet->getCell($matrix_name_cordinate[$key + $pre].'3')->setValue($lastname["value_e"]);
            $worksheet->getCell($matrix_name_cordinate[$key + $pre].'4')->setValue($lastname["value_f"]);
            $worksheet->getCell($matrix_name_cordinate[$key + $pre].'5')->setValue($lastname["char"]);

            $worksheet->getCell($matrix_name_cordinate[$key + $pre].'6')->setValue($matrix->table_of_name_values->unvowel[2][$key]["value_f"]);
            $worksheet->getCell($matrix_name_cordinate[$key + $pre].'7')->setValue($matrix->table_of_name_values->unvowel[2][$key]["value_e"]);
            $worksheet->getCell($matrix_name_cordinate[$key + $pre].'8')->setValue($matrix->table_of_name_values->unvowel[2][$key]["value_m"]);
        }

        $worksheet->getCell("AH2")->setValue($matrix->sums->vowel["sum_m"]);
        $worksheet->getCell("AH3")->setValue($matrix->sums->vowel["sum_e"]);
        $worksheet->getCell("AH4")->setValue($matrix->sums->vowel["sum_f"]);
        $worksheet->getCell("AH6")->setValue($matrix->sums->unvowel["sum_f"]);
        $worksheet->getCell("AH7")->setValue($matrix->sums->unvowel["sum_e"]);
        $worksheet->getCell("AH8")->setValue($matrix->sums->unvowel["sum_m"]);

        $worksheet->getCell("AI2")->setValue($matrix->sums->vowel["dev_sum_m_one"]);
        $worksheet->getCell("AI3")->setValue($matrix->sums->vowel["dev_sum_e_one"]);
        $worksheet->getCell("AI4")->setValue($matrix->sums->vowel["dev_sum_f_one"]);

        $worksheet->getCell("AI6")->setValue($matrix->sums->unvowel["dev_sum_f_one"]);
        $worksheet->getCell("AI7")->setValue($matrix->sums->unvowel["dev_sum_e_one"]);
        $worksheet->getCell("AI8")->setValue($matrix->sums->unvowel["dev_sum_m_one"]);

        //anima
        $worksheet->getCell("AJ2")->setValue($matrix->sums->vowel["dev_sum_m_two"]);
        $worksheet->getCell("AJ3")->setValue($matrix->sums->vowel["dev_sum_e_two"]);
        $worksheet->getCell("AJ4")->setValue($matrix->sums->vowel["dev_sum_f_two"]);
        //personalita
        $worksheet->getCell("AJ6")->setValue($matrix->sums->unvowel["dev_sum_f_two"]);
        $worksheet->getCell("AJ7")->setValue($matrix->sums->unvowel["dev_sum_e_two"]);
        $worksheet->getCell("AJ8")->setValue($matrix->sums->unvowel["dev_sum_m_two"]);


        $worksheet->getCell("AL5")->setValue($matrix->sums->sum_vowel_unvowel["sum_f"]);
        $worksheet->getCell("AL6")->setValue($matrix->sums->sum_vowel_unvowel["dev_sum_f"]);
        $worksheet->getCell("AM5")->setValue($matrix->sums->sum_vowel_unvowel["sum_e"]);
        $worksheet->getCell("AM6")->setValue($matrix->sums->sum_vowel_unvowel["dev_sum_e"]);
        $worksheet->getCell("AN5")->setValue($matrix->sums->sum_vowel_unvowel["sum_m"]);
        $worksheet->getCell("AN6")->setValue($matrix->sums->sum_vowel_unvowel["dev_sum_m"]);
        $worksheet->getCell("AO5")->setValue($matrix->sums->sum_vowel_unvowel["sum_dev_one_f"]);
        $worksheet->getCell("AP5")->setValue($matrix->sums->sum_vowel_unvowel["numero_espressione"]);


        $worksheet->getCell("K11")->setValue($matrix->matrix->NL);

        //trilogie
        // $worksheet->getCell("B12")->setValue($matrix->matrix->trilogie["horizontale_3_6_9"]);
        // $worksheet->getCell("B14")->setValue($matrix->matrix->trilogie["horizontale_3_6_9"]);
        // $worksheet->getCell("B16")->setValue($matrix->matrix->trilogie["horizontale_1_4_7"]);
        // $worksheet->getCell("C11")->setValue($matrix->matrix->trilogie["verticale_1_2_3"]);
        // $worksheet->getCell("E11")->setValue($matrix->matrix->trilogie["verticale_4_5_6"]);
        // $worksheet->getCell("G11")->setValue($matrix->matrix->trilogie["verticale_7_8_9"]);
        // $worksheet->getCell("B18")->setValue($matrix->matrix->trilogie["diagonale_1_5_9"]);
        // $worksheet->getCell("I18")->setValue($matrix->matrix->trilogie["diagonale_3_5_7"]);

        //tabella
        //1
        $worksheet->getCell("C17")->setValue($matrix->matrix->tabella[1]["percentage"]);
        $worksheet->getCell("C16")->setValue($matrix->matrix->tabella[1]["count"]);

        //2
        $worksheet->getCell("C15")->setValue($matrix->matrix->tabella[2]["percentage"]);
        $worksheet->getCell("C14")->setValue($matrix->matrix->tabella[2]["count"]);

        //3
        $worksheet->getCell("C13")->setValue($matrix->matrix->tabella[3]["percentage"]);
        $worksheet->getCell("C12")->setValue($matrix->matrix->tabella[3]["count"]);

        //4
        $worksheet->getCell("E17")->setValue($matrix->matrix->tabella[4]["percentage"]);
        $worksheet->getCell("E16")->setValue($matrix->matrix->tabella[4]["count"]);

        //5
        $worksheet->getCell("E15")->setValue($matrix->matrix->tabella[5]["percentage"]);
        $worksheet->getCell("E14")->setValue($matrix->matrix->tabella[5]["count"]);

        //6
        $worksheet->getCell("E13")->setValue($matrix->matrix->tabella[6]["percentage"]);
        $worksheet->getCell("E12")->setValue($matrix->matrix->tabella[6]["count"]);

        //7
        $worksheet->getCell("G17")->setValue($matrix->matrix->tabella[7]["percentage"]);
        $worksheet->getCell("G16")->setValue($matrix->matrix->tabella[7]["count"]);

        //8
        $worksheet->getCell("G15")->setValue($matrix->matrix->tabella[8]["percentage"]);
        $worksheet->getCell("G14")->setValue($matrix->matrix->tabella[8]["count"]);

        //9
        $worksheet->getCell("G13")->setValue($matrix->matrix->tabella[9]["percentage"]);
        $worksheet->getCell("G12")->setValue($matrix->matrix->tabella[9]["count"]);


        //creo il documento
        $writer = IOFactory::createWriter($spreadsheet, 'Xls');

        //salvo il documento
        $path_file = Storage::disk('files')->path($fileName);
        $writer->save($path_file);

        $file_stream = file_get_contents($path_file);

        // Storage::disk('files')->delete($fileName);

        return [
            'file_stream' => $file_stream,
            'file_name' => $fileName
        ];
    }
}
?>
