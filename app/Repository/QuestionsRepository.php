<?php

namespace App\Repository;

use App\Models\Question;

class QuestionsRepository implements InterfaceQuestionsRepository
{
    public function getQuestionsByExamID($id)
    {
        return question::all()->where('exam_id', $id);
    }

    public function getCorrectAnswerExamID($id)
    {
        return question::where('id', $id)->get(['correct_answer', 'number_for_exam'])->first();
    }

    public function addQuestion($question)
    {
        return question::create([
            'number_for_exam' => $question[0],
            'paragraph' => $question[1],
            'question' => $question[2],
            'option_1' => $question[3],
            'option_2' => $question[4],
            'option_3' => $question[5],
            'option_4' => $question[6],
            'correct_answer' => $question[7],
            'image' => $question[8],
            'audio' => $question[9],
            'exam_id' => $question[10],
        ]);
    }
}
