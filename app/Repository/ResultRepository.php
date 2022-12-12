<?php

namespace App\Repository;

use App\Models\Result;

class ResultRepository implements InterfaceResultRepository
{
    public function saveResult($data)
    {
        return Result::create([
            'correct_listening' => $data[0],
            'correct_reading' => $data[1],
            'point' => $data[2],
            'user_id' => $data[3],
            'exam_id' => $data[4],
        ]);
    }
}
