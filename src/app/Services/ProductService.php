<?php

namespace App\Services;

use App\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAll()
    {
        $result = $this->productRepository->getAll();

        return $result;
    }

    public function store($data)
    {
        $result = $this->productRepository->save($data);

        return $result;
    }
}
