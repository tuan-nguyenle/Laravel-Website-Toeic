<?php

namespace App\Http\Controllers;

use App\Repository\NewsRepository;
use App\Repository\SlideBannerRepository;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $bannerRepo;
    protected $newsRepo;
    public function __construct(SlideBannerRepository $bannerRepository, NewsRepository $newsRepository)
    {
        $this->bannerRepo = $bannerRepository;
        $this->newsRepo = $newsRepository;
    }

    public function HomePage()
    {
        return view('client.home')->with([
            'listBanner' => $this->bannerRepo->getAllBannerActive(),
            'index' => 0,
        ]);
    }

    public function ListNews()
    {
        return view('client.list-news')->with([
            'listNews' => $this->newsRepo->getAllNewsActive(),
        ]);
    }

    public function viewNewsDetail($slug)
    {
        $news = $this->newsRepo->getNewsBySlug($slug);
        // dd($news);
        if ($news == null) {
            abort(404);
        }
        return view('client.news-detail')->with(compact('news'));
    }

    public function AboutUs()
    {
        return view('client.about-us');
    }
}
