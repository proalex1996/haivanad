<?php


namespace App\Repositories\Customer;


use App\Model\CustomerModel;
use App\Repositories\RepositoryEloquent;

class CustomerRepositoryEloquent extends RepositoryEloquent implements CustomerRepositoryInterface
{
    public function getModel()
    {
        // Có thể bớ cái scopeActive zô đây được này
        // => Sửa duy nhất ở đây là đủ rồi :D
        return CustomerModel::class;
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
