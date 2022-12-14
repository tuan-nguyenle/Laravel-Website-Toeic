<?php

namespace App\Repository;

use App\Models\News;
use Illuminate\Support\Str;

class NewsRepository implements InterfaceNewsRepository
{
    public function getAllNews()
    {
        return News::with('user')->orderBy('created_at', 'desc')->paginate(10);
    }
    public function getNewsById($id)
    {
        return News::where('id', $id)->first();
    }
    public function addNews($data = [], $pathThumbnail)
    {
        return News::create([
            'title' => $data['title'],
            'href_param' => Str::slug($data['title'], '-'),
            'thumbnail' => $pathThumbnail,
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'is_active' => $data['status'],
        ]);
    }
    public function editNews($data = [])
    {
        $news = $this->getNewsById($data['id']);
        return $news->update([
            'title' => $data['title'],
            'href_param' => Str::slug($data['title'], '-'),
            'content' => $data['content'],
            'user_id' => $data['user_id'],
            'is_active' => $data['status'],
        ]);
    }

    public function changeImg($id, $pathThumbnail)
    {
        $news = $this->getNewsById($id);
        return $news->update([
            'thumbnail' => $pathThumbnail,
        ]);
    }

    public function getAllNewsActive()
    {
        return News::where('is_active', 1)->paginate(10);
    }

    public function getNewsBySlug($slug)
    {
        // dd($slug);
        return News::all()->filter(function ($news) use ($slug) {
            if ($news->is_active == 1 && $news->href_param == $slug) {
                return $news;
            }
        })->first();
    }
}
