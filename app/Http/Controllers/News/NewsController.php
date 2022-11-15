<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Repository\InterfaceNewsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
    protected $newsRepo;
    public function __construct(InterfaceNewsRepository $newRepository)
    {
        $this->newsRepo = $newRepository;
    }

    public function index()
    {
        $listNews = $this->newsRepo->getAllNews();
        return view('news.index')->with([
            'listNews' => $listNews,
        ]);
    }

    public function view(Request $request)
    {
        $new = null;
        $id = $request->id;
        if (isset($id)) {
            $new = $this->newsRepo->getNewsById($id);
        }
        return view('news.view')->with([
            'newDetail' => $new
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'txtContent' => 'required',
            'cbStatus' => 'required',
            'txtTitle' => 'required',
        ]);
        $data = [
            'id' => $request->idNews,
            'title' => $request->txtTitle,
            'content' => $request->txtContent,
            'status' => $request->cbStatus,
            'user_id' => Auth::user()->getAuthIdentifier(),
            'img' => $request->file('image')
        ];
        $path = 'asset/news';
        // get file
        $file = $_FILES['image'];
        // cut and file type
        $type_file = substr($file['type'], 6);
        // rename file
        $pathImage = $path . "/" . $data['title'] . "." . $type_file;
        $newById = $this->newsRepo->getNewsById($data['id']);
        if (!$newById) {
            if (!$data['img']) {
                $img = 'asset/news/df_banner.jpg';
                $this->newsRepo->addNews($data, $img);
                return back()->with(
                    'message',
                    'Add News Success'
                );
            }
            // upload file
            $upload = $data['img']->move(public_path($path), $pathImage);
            if ($upload) {
                $this->newsRepo->addNews($data, $pathImage);
            }
            return back()->with(
                'message',
                'Add News Success'
            );
        }

        if ($data['img']) {
            $upload = $data['img']->move(public_path($path), $pathImage);
            $this->newsRepo->changeImg($data['id'], $pathImage);
        }

        $this->newsRepo->editNews($data);
        return back()->with(
            'message',
            'Edit News Success'
        );
    }
}
