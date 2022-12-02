<?php

namespace App\Repository;

interface InterfaceNewsRepository
{
    public function getAllNews();
    public function getNewsById($id);
    public function getNewsBySlug($slug);
    public function addNews($data = [], $pathThumbnail);
    public function editNews($data = []);
    public function changeImg($id, $pathThumbnail);
    public function getAllNewsActive();
}
