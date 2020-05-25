<?php
/**
 * Created by PhpStorm.
 * User: DIego
 * Date: 5/25/2020
 * Time: 6:39 PM
 */

namespace App\Contracts;


interface IProductRepository
{
    public function all();

    public function create(array  $data);

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);
}