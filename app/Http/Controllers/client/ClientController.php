<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\HomeController;
use App\Repository\InterfaceExamsRepository;
use App\Repository\InterfaceQuestionsRepository;
use App\Repository\InterfaceResultRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientController extends HomeController
{
    protected $examRepo;
    protected $questionRepo;
    protected $resultRepo;
    public function __construct(InterfaceExamsRepository $examsRepository, InterfaceQuestionsRepository $questionRepo, InterfaceResultRepository $resultRepository)
    {
        $this->middleware('auth');
        $this->examRepo = $examsRepository;
        $this->questionRepo = $questionRepo;
        $this->resultRepo = $resultRepository;
    }

    public function index()
    {
        $listExam = $this->examRepo->getAllExams();
        return view('client.test.list-test')->with(['listExam' => $listExam]);
    }

    public function takeExam($testId)
    {
        $testDetail = $this->examRepo->getQuestionById($testId);
        $listQuestion = $testDetail->map->question->first();
        $listQuestionP1 = $listQuestion->slice(0, 6);
        $listQuestionP2 = $listQuestion->slice(6, 25);
        $listQuestionP3 = $listQuestion->slice(31, 39);
        $listQuestionP4 = $listQuestion->slice(70, 30);
        $listQuestionP5 = $listQuestion->slice(100, 30);
        $listQuestionP6 = $listQuestion->slice(130, 16);
        $listQuestionP7_2 = $listQuestion->slice(146, 8);
        $listQuestionP7_3 = $listQuestion->slice(154, 9);
        $listQuestionP7_4 = $listQuestion->slice(163, 12);
        $listQuestionP7_5 = $listQuestion->slice(175, 25);
        // dd($listQuestionP7_4);
        return view('client.test.test-detail')->with([
            'id' => $testId,
            'infoExam' => $testDetail->map->level->first() . ' ' . $testDetail->map->description->first(),
            'listQuestionP1' => $listQuestionP1,
            'listQuestionP2' => $listQuestionP2,
            'listQuestionP3' => $listQuestionP3,
            'listQuestionP4' => $listQuestionP4,
            'listQuestionP5' => $listQuestionP5,
            'listQuestionP6' => $listQuestionP6,
            'listQuestionP7_2' => $listQuestionP7_2,
            'listQuestionP7_3' => $listQuestionP7_3,
            'listQuestionP7_4' => $listQuestionP7_4,
            'listQuestionP7_5' => $listQuestionP7_5,
        ]);
    }

    public function result(Request $request)
    {
        $correctListen = 0;
        $correctReading = 0;
        $answer = collect($request->answer);
        foreach ($answer as $key => $value) {
            // echo $key;
            if ($this->questionRepo->getCorrectAnswerExamID($key)->number_for_exam >= 100) {
                if ($this->questionRepo->getCorrectAnswerExamID($key)->correct_answer == $value) {
                    $correctReading++;
                }
            } else {
                if ($this->questionRepo->getCorrectAnswerExamID($key)->correct_answer == $value) {
                    $correctListen++;
                }
            }
        }
        $scoreListening = [
            '0', '5', '5', '5', '5', '5', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50', '55', '60', '65', '70', '75', '80', '85', '90', '95', '100', '110', '115', '120', '125', '130', '135', '140', '145', '150', '160', '165', '170', '175', '180', '185', '190', '195', '200', '210', '215', '220', '230', '240', '245', '250', '255', '260', '270', '275', '280', '290', '295', '300', '310', '315', '320', '325', '330', '340', '345', '350', '360', '365', '370', '380', '385', '390', '395', '400', '405', '410', '420', '425', '430', '440', '445', '450', '460', '465', '470', '475', '480', '485', '490', '495', '495', '495', '495', '495', '495', '495', '495', '495', '495', '495'
        ];

        $scoreReading = [
            '0', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '5', '10', '15', '20', '25', '30', '35', '40', '45', '50', '60', '65', '70', '80', '85', '90', '95', '100', '110', '115', '120', '125', '130', '140', '145', '150', '160', '165', '170', '175', '180', '190', '195', '200', '210', '215', '220', '225', '230', '235', '240', '250', '255', '260', '265', '270', '280', '285', '290', '300', '305', '310', '320', '325', '330', '335', '340', '350', '355', '360', '365', '370', '380', '385', '390', '395', '400', '405', '410', '415', '420', '425', '430', '435', '445', '450', '455', '465', '470', '480', '485', '490', '495', '495', '495', '495'
        ];

        $markListening = $scoreListening[$correctListen];
        $markReading = $scoreReading[$correctReading];

        // return [$correctListen, $correctReading, $markListening + $markReading, Auth::id(), $request->id];

        $this->resultRepo->saveResult([$correctListen, $correctReading, $markListening + $markReading, Auth::id(), $request->id]);

        return response([
            'message' => "Congratulations",
            'correct_answer' => $correctListen + $correctReading,
            'listening' => $scoreListening[($correctListen)],
            'reading' => $scoreReading[($correctReading)],
            'total' => $markListening + $markReading,
        ]);
    }
}
