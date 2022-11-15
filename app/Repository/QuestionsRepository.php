<?php

namespace App\Repository;

use App\Models\Question;

class QuestionsRepository implements InterfaceQuestionsRepository
{
    public function getQuestionsByExamID($id)
    {
        return question::all()->where('exam_id', $id);
    }

    public function addQuestion($question)
    {
        dd($question);
        // return question::created([

        // ]);
    }
}
