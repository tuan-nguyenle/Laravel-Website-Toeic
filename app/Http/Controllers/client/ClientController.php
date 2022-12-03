<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\HomeController;
use App\Repository\ExamsRepository;
use Illuminate\Http\Request;

class ClientController extends HomeController
{
    protected $examRepo;
    public function __construct(ExamsRepository $examsRepository)
    {
        $this->middleware('auth');
        $this->examRepo = $examsRepository;
    }

    public function index()
    {
        $listExam = $this->examRepo->getAllExams();
        return view('client.test.list-test')->with(['listExam' => $listExam]);
    }
}
