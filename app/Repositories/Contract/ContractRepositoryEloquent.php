<?php


namespace App\Repositories\Contract;


use App\Model\ContractModel;
use App\Repositories\Contract\ContractRepositoryInterface;
use App\Repositories\RepositoryEloquent;

class ContractRepositoryEloquent extends RepositoryEloquent implements ContractRepositoryInterface
{
    public function getModel()
    {
        // Có thể bớ cái scopeActive zô đây được này
        // => Sửa duy nhất ở đây là đủ rồi :D
        return ContractModel::class;
    }

    public function getAllPublished()
    {
        $result = $this->_model->where('is_published', 1)->get();

        return $result;
    }

    public function findOnlyPublished($id)
    {
        $result = $this
            ->_model
            ->where('id', $id)
            ->where('is_published', 1)
            ->first();

        return $result;
    }
}
