<?php


namespace App\Repositories\Staff;


interface staffRepositoryInterface
{
    public function getAllPublished();
    public function findOnlyPublished($id);
}
