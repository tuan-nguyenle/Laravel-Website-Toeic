<?php

namespace App\Repository;

interface InterfaceExamsRepository
{
    public function getAllExams();
    public function getQuestionById($id);
    public function addNewExam($attribute = []);
}
