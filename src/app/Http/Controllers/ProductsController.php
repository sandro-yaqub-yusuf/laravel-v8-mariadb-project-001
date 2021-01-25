<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\ProductService;
use Illuminate\Http\Request;
use Exception;

class ProductsController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $filter = $request->query('filter', null);

        if ($filter) {
            $data = $this->productService->getAllFilterPaginate($filter, 5);
        } else {
            $data = $this->productService->getAllPaginate(5);
        }

        return view('product.index', ['products' => $data, 'filter' => $filter]);
    }

    public function create()
    {
        return view('product.create');
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

            return redirect()->route('product-index')->withSuccess('Produto cadastrado com sucesso');
        } 
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return view('product.create', ['resultAction' => $result]);
    }

    public function edit($id)
    {
        $result = [];

        try {
            $product = $this->productService->getById($id);

            if ($product) return view('product.edit', ['product' => $product]);

            return redirect()->route('product-index')->withErrors('Produto não cadastrado !!!');
        }
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return redirect()->route('product-index')->withErrors('Problemas ao carregar os dados do Produto !!!');
    }

    public function update(ProductUpdateRequest $request, $id)
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

            if ($request->file("image")) {
                $extension = $request->file("image")->extension();
                $filename = time().".".$extension;
            } else {
                $filename = '';                
            }

            $data['filename'] = $filename;

            $this->productService->update($data, $id);

            if ($filename != '') $request->file("image")->move(public_path("img/products"), $filename);

            return redirect()->route('product-index')->withSuccess('Produto alterado com sucesso...');
        }
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return redirect()->route('product-edit', ['id' => $id])->withErrors('O Produto não pode ser alterado !!!');
    }

    public function destroy($id)
    {
        $result = [];

        try {
            $product = $this->productService->getById($id);

            if ($product) return view('product.destroy', ['product' => $product]);

            return redirect()->route('product-index')->withErrors('Produto não cadastrado !!!');
        }
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return redirect()->route('product-index')->withErrors('Problemas ao carregar os dados do Produto !!!');
    }

    public function delete($id)
    {
        $result = [];

        try {
            $this->productService->delete($id);

            return redirect()->route('product-index')->withSuccess('Produto excluído com sucesso...');
        }
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return redirect()->route('product-destroy', ['id' => $id])->withErrors('O Produto não pode ser excluído !!!');
    }

    public function show($id)
    {
        $result = [];

        try {
            $product = $this->productService->getById($id);

            if ($product) return view('product.show', ['product' => $product]);

            return redirect()->route('product-index')->withErrors('Produto não cadastrado !!!');
        }
        catch (Exception $ex) {
            $message[] = ['ERROR' => $ex->getMessage()];

            $result = [
                'status' => 'ERRO',
                'message' => $message
            ];
        }

        return redirect()->route('product-index')->withErrors('Problemas ao carregar os dados do Produto !!!');
    }
}
