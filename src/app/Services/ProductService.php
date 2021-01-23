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

    public function getAllFilterPaginate($filter, $pages)
    {
        $result = $this->productRepository->getAllFilterPaginate($filter, $pages);

        return $result;
    }    

    public function getAllPaginate($pages)
    {
        $result = $this->productRepository->getAllPaginate($pages);

        return $result;
    }
    
    public function getById($id)
    {
        $result = $this->productRepository->getById($id);

        return $result;
    }

    public function store($data)
    {
        $result = $this->productRepository->save($data);

        return $result;
    }

    public function update($data, $id)
    {
        $result = $this->productRepository->update($data, $id);

        return $result;
    }
}
