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
}
