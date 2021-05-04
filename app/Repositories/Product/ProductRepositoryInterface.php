<?php


namespace App\Repositories\Product;


interface ProductRepositoryInterface
{
    public function getAllPublished();
    public function findOnlyPublished($id);
}
