<?php


namespace App\Repositories\Customer;


interface CustomerRepositoryInterface
{
    public function getAllPublished();
    public function findOnlyPublished($id);
}
