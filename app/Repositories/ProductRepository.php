<?php
/**
 * Created by PhpStorm.
 * User: DIego
 * Date: 5/25/2020
 * Time: 6:58 PM
 */

namespace App\Repositories;


use App\Contracts\IProductRepository;
use App\Models\Product;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ProductRepository implements IProductRepository
{
    protected $model;

    /**
     * ProductRepository constructor.
     * @param Product $post
     */
    public function __construct(Product $post)
    {
        $this->model = $post;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        // TODO: Implement create() method.
    }

    public function update(array $data, $id)
    {
        // TODO: Implement update() method.
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
    }

    public function find($id)
    {
        return $this->model->find($id);
    }
}