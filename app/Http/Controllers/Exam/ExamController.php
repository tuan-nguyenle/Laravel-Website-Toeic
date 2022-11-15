<?php

namespace App\Http\Controllers\Exam;

use App\Http\Controllers\HomeController;
use App\Imports\QuestionImports;
use App\Repository\InterfaceExamsRepository;
use App\Repository\InterfaceQuestionsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ExamController extends HomeController
{
    protected $examRepo;
    protected $questionRepo;
    public function __construct(InterfaceExamsRepository $examRepository, InterfaceQuestionsRepository $questionRepository)
    {
        $this->examRepo = $examRepository;
        $this->questionRepo = $questionRepository;
    }
    public function index()
    {
        $listExams = $this->examRepo->getAllExams();
        return view('exam.index')->with([
            'listExam' => $listExams,
        ]);
    }

    public function view(Request $request)
    {
        $listQuestion = $this->examRepo->getQuestionById($request->id);
        return view('exam.view')->with([
            'idExam' => $request->id,
            'listQuestion' => $listQuestion,
        ]);
    }

    public function import($file, $pathImage, $pathAudio, $examID)
    {
        $exam = Excel::toArray(new QuestionImports, $file);
        // dd($exam[0]);
        array_filter($exam[0], function ($item) use ($pathImage, $pathAudio) {
            // $item[10] = ;
            if ($item[8] != null) {
                $item[8] = $pathImage . "/" . $item[8];
            }
            if ($item[9] != null) {
                $item[9] = $pathAudio . "/" . $item[9];
            }
            $this->questionRepo->addQuestion($item);
        });
        // return back();
    }

    public function add(Request $request)
    {
        // validate Request
        $request->validate([
            'filesMedia' => 'required',
            'filesMedia.*' => 'mimes:png,jpg,mp3',
            'txtDescription' => 'required|max:250',
            'fileExcel' => 'required',
            'fileExcel.*' => 'mimes:xlsx',
            'level' => 'required|integer|max:990|min:0'
        ]);
        // data of Exam
        $data = [
            'description' => $request->txtDescription,
            'level' => $request->level
        ];
        // check file Excel Exam 
        if (Storage::exists('public/exam/' . $request->fileExcel->getClientOriginalName())) {
            return back()->with(
                [
                    'status' => '0',
                    'message' => 'The Exam Was existed !!!!!!'
                ]
            );
        }
        // add new Exam
        $newExam = $this->examRepo->addNewExam($data);
        // save File Excel and File Image if not Exist in storage
        Storage::putFileAs('public/exam', $request->fileExcel, $request->fileExcel->getClientOriginalName());
        // get Path and ID from Newest Exam
        $examID = $newExam->id;
        $pathImage = 'public/exam/img/img_test_' . $examID;
        $pathAudio = 'public/exam/img/img_test_' . $examID;
        array_filter($request->file('filesMedia'), function ($item) use ($pathImage, $pathAudio) {
            if ($item->getMimeType() == 'image/png' | $item->getMimeType() == 'image/jpg' | $item->getMimeType() == 'image/jpeg') {
                Storage::putFileAs($pathImage, $item, $item->getClientOriginalName());
            }
            if ($item->getMimeType() == 'audio/mpeg') {
                Storage::putFileAs($pathAudio, $item, $item->getClientOriginalName());
            }
        });

        // read file Excel and save new Question
        $this->import($request->fileExcel, $pathImage, $pathAudio, $examID);

        return back()->with(
            [
                'status' => '1',
                'message' => 'Add Exam Success !!!!!!'
            ]
        );
    }

    public function viewAddExam()
    {
        return view('exam.addExam');
    }
}
