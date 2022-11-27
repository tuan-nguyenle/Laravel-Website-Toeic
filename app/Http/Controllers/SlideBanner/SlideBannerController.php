<?php

namespace App\Http\Controllers\SlideBanner;

use App\Http\Controllers\AdminController;
use App\Repository\SlideBannerRepository;
use Illuminate\Http\Request;

class SlideBannerController extends AdminController
{
    protected $bannerRepo;
    public function __construct(SlideBannerRepository $bannerRepository)
    {
        $this->bannerRepo = $bannerRepository;
    }

    public function index()
    {
        return view('slide_banner.index')->with([
            'listBanner' => $this->bannerRepo->getAllBanner(),
        ]);
    }

    public function add(Request $request)
    {
        $request->validate([
            'txtTitle' => 'required|max:255|string',
            'txtContent' => 'required|max:255|string',
            'fileImage' => 'required|image|mimes:jpeg,png',
        ]);
        $data = [
            'txtTitle' => $request->txtTitle,
            'txtContent' => $request->txtContent,
            'fileImage' => $request->file('fileImage')->getClientOriginalName(),
        ];
        $saveNewBanner = $this->bannerRepo->addNewBanner($data);
        if (!$saveNewBanner) {
            return back()->with([
                'status' => 'failed',
            ]);
        }
        $imagePath = public_path() . '/asset/slide-banner/';
        $request->fileImage->move($imagePath, $request->file('fileImage')->getClientOriginalName());
        return back()->with([
            'status' => 'success',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255|string',
            'content' => 'required|max:255|string'
        ]);
        $data = [
            'id' => $request->id,
            'title' => $request->title,
            'content' => $request->content,
            'status' => $request->status,
        ];
        $this->bannerRepo->updateBanner($data);
        return 'Update banner ' . $request->id . ' success';
    }
}
