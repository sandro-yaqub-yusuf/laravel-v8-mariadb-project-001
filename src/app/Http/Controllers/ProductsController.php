<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Services\ProductService;
use Exception;

class ProductsController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        $data = $this->productService->getAll();

        return view('product/index', ['products' => $data]);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store(ProductCreateRequest $request)
    {
        $result = [];

        try {
            $data = $request->only([
                'name',
                'description',
                'image',
                'quantity',
                'cost_price',
                'sales_price',
                'status'
            ]);
            
            $extension = $request->file("image")->extension();
            $filename = time().".".$extension;

            $data['filename'] = $filename;

            $this->productService->store($data);

            $request->file("image")->move(public_path("img/products"), $filename);

            return redirect()->route('produtos.index')
                             ->withSuccess('Produto cadastrado com sucesso');
        } 
        catch (Exception $ex) {
            $result = [
                'status' => 'ERRO',
                'message' => json_decode($ex->getMessage(), true)
            ];
        }

        return view('product/create', ['resultAction' => $result]);
    }
}
