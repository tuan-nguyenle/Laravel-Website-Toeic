<?php

namespace App\Imports;

use App\Models\Question;
use Maatwebsite\Excel\Concerns\ToModel;

class QuestionImports implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // return new Question([
        //     'number_for_exam' => (int)$row[0],
        //     'paragraph' => $row[1],
        //     'question' => $row[2],
        //     'option_1' => $row[3],
        //     'option_2' => $row[4],
        //     'option_3' => $row[5],
        //     'option_4' => $row[6],
        //     'correct_answer' => $row[7],
        //     'image' => $row[8],
        //     'audio' => $row[9],
        //     'exam_id' => (int)$row[10],
        // ]);
    }
}
