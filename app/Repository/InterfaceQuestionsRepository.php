<?php

namespace App\Repository;

interface InterfaceQuestionsRepository
{
    public function getQuestionsByExamID($id);
    public function getCorrectAnswerExamID($id);
    public function addQuestion($question);
}
