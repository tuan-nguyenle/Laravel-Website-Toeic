<?php

namespace App\Repository;

use App\Models\Slide_banner_homepage;

class SlideBannerRepository implements InterfaceSlideBannerRepository
{
    public function getAllBanner()
    {
        return Slide_banner_homepage::all();
    }
    public function getBannerById($id)
    {
        return Slide_banner_homepage::all()->where('id', $id)->first();
    }
    public function addNewBanner($data)
    {
        return Slide_banner_homepage::create([
            'title' => $data['txtTitle'],
            'content' => $data['txtContent'],
            'image' => $data['fileImage'],
        ]);
    }
    public function updateBanner($data)
    {
        $banner = $this->getBannerById($data['id']);
        return $banner->update([
            'title' => $data['title'],
            'content' => $data['content'],
            'status' => $data['status'],
        ]);
    }
}
