<?php

namespace App\Repository;

use App\Models\Exam;

class ExamsRepository implements InterfaceExamsRepository
{
    public function getAllExams()
    {
        return Exam::all();
    }

    public function getQuestionById($id)
    {
        return Exam::with('question')->where('id', $id)->get();
    }

    public function addNewExam($attribute = [])
    {
        return Exam::create([
            'description' => $attribute['description'],
            'level' => $attribute['level'],
        ]);
    }
}
