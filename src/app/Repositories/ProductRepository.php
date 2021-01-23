<?php

namespace App\Repositories;

use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getAll()
    {
        $result = Product::all();

        return $result;
    }

    public function getAllFilterPaginate($filter, $pages)
    {
        $result = Product::where('name', 'LIKE', ('%'.$filter.'%'))
                       ->orWhere('description', 'LIKE', ('%'.$filter.'%'))
                       ->orderBy('id', 'DESC')
                       ->paginate($pages);

        return $result;
    }    

    public function getAllPaginate($pages)
    {
        $result = Product::orderBy('id', 'DESC')->paginate($pages);

        return $result;
    }

    public function getById($id)
    {
        $result = Product::where('id', $id)->first();

        return $result;
    }

    public function save($data)
    {
        $product = new $this->product;
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->image = $data['filename'];
        $product->quantity = $data['quantity'];
        $product->cost_price = $data['cost_price'];
        $product->sales_price = $data['sales_price'];
        $product->status = $data['status'];

        $product->save();

        return $product->fresh();
    }

    public function update($data, $id)
    {
        $product = $this->getById($id);
        $product->name = $data['name'];
        $product->description = $data['description'];
        $product->image = ($data['filename'] == '' ? $product->image : $data['filename']);
        $product->quantity = $data['quantity'];
        $product->cost_price = $data['cost_price'];
        $product->sales_price = $data['sales_price'];
        $product->status = $data['status'];

        $product->save();

        return $product->fresh();
    }
}
