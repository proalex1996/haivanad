<?php


namespace App\Repositories\Contract;


interface ContractRepositoryInterface
{
    public function getAllPublished();
    public function findOnlyPublished($id);
}
