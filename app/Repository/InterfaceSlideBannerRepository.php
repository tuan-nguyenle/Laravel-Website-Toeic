<?php

namespace App\Repository;

interface InterfaceSlideBannerRepository
{
    public function getAllBanner();
    public function addNewBanner($data);
    public function getBannerById($id);
    public function updateBanner($data);
}
