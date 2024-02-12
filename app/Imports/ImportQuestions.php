<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ImportQuestions implements ToModel, WithStartRow
{
    private $quiz_id = '';
    public function  __construct($quiz_id)
    {
        $this->quiz_id = $quiz_id;
    }

    public function startRow(): int
    {
        return 2;
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $option = "";
        $answer = "";
        $qns_opt_1 = $row[3];
        $qns_opt_2 = $row[4];
        $qns_opt_3 = $row[5];
        $qns_opt_4 = $row[6];
        $qns_opt_5 = $row[7];
        $qns_opt_6 = $row[8];

        $qns_ans_1 = $row[9];
        $qns_ans_2 = $row[10];
        $qns_ans_3 = $row[11];
        $qns_ans_4 = $row[12];
        $qns_ans_5 = $row[13];
        $qns_ans_6 = $row[14];

        $qns_type = "";

        if ($row[2] == 'T' ) {
            $qns_type = 'True Or False';
            $option = "{ \"options\": [";
            $option .= "{\"name\": \"True\"} , ";
            $option .= "{\"name\": \"False\"} ";
            $option .= "]}";

            $answer = "{ \"answer\": [";
            if ($row[9] == 'True') {
                $answer .= "{\"name\": \"True\"} ";
            } else {
                $answer .= "{\"name\": \"False\"} ";
            }
            $answer .= "]}";
        } else if ($row[2] == 'S' || $row[2] == 'M') {

            if ($row[2] == 'M' ) {
                $qns_type = 'Multi Choice';
            } else {
                $qns_type = 'Single Choice';
            }

            $option = "{ \"options\": [";
            $answer = "{ \"answer\": [";
            $option_list = [];
            $answer_list = [];

            if ($qns_opt_1 != null && $qns_opt_1 != '') {
                $option_list[] = $qns_opt_1;
            }
            if ($qns_opt_2 != null && $qns_opt_2 != '') {
                $option_list[] = $qns_opt_2;
            }
            if ($qns_opt_3 != null && $qns_opt_3 != '') {
                $option_list[] = $qns_opt_3;
            }
            if ($qns_opt_4 != null && $qns_opt_4 != '') {
                $option_list[] = $qns_opt_4;
            }
            if ($qns_opt_5 != null && $qns_opt_5 != '') {
                $option_list[] = $qns_opt_5;
            }
            if ($qns_opt_6 != null && $qns_opt_6 != '') {
                $option_list[] = $qns_opt_6;
            }
            
            foreach ($option_list as $op) {
                $option .= "{\"name\": \"" . $op . "\"} ,";
            }

            $option = substr($option, 0, -1);

            if ($qns_ans_1 != null && $qns_ans_1 != '') {
                $answer_list[] = $qns_ans_1;
            }
            if ($qns_ans_2 != null && $qns_ans_2 != '') {
                $answer_list[] = $qns_ans_2;
            }
            if ($qns_ans_3 != null && $qns_ans_3 != '') {
                $answer_list[] = $qns_ans_3;
            }
            if ($qns_ans_4 != null && $qns_ans_4 != '') {
                $answer_list[] = $qns_ans_4;
            }
            if ($qns_ans_5 != null && $qns_ans_5 != '') {
                $answer_list[] = $qns_ans_5;
            }
            if ($qns_ans_6 != null && $qns_ans_6 != '') {
                $answer_list[] = $qns_ans_6;
            }

            foreach ($answer_list as $an) {
                $answer .= "{\"name\": \"" . $an . "\"} ,";
            }

            $answer = substr($answer, 0, -1);

            $option .= "]}";
            $answer .= "]}";
        }

        return new Question([
            'quiz_id' => $this->quiz_id,
            'question' => $row[0],
            'description' => $row[1],
            'question_type' => $qns_type,
            'question_options' => $option,
            'question_answers' => $answer
        ]);
    }
}
