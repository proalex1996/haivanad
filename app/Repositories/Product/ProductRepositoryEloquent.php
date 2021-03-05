<?php


namespace App\Repositories\Product;


use App\Model\ProductModel;
use App\Repositories\RepositoryEloquent;

class ProductRepositoryEloquent extends RepositoryEloquent implements ProductRepositoryInterface
{
    public function getModel()
    {
        // Có thể bớ cái scopeActive zô đây được này
        // => Sửa duy nhất ở đây là đủ rồi :D
        return ProductModel::class;
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
