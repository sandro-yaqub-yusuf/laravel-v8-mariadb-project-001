<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaginateRequest;
use App\Http\Requests\ProductIndexRequest;
use App\Http\Requests\ProductCreateRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Services\AuthService;
use App\Services\ProductService;
use Exception;

class ProductsController extends Controller
{
    public function index(ProductIndexRequest $productIndexRequest, AuthService $authService, ProductService $productService)
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        $filter_name = $productIndexRequest->query('name', null);
        $products = $productService->all()->paginate(5);

        return view('product.index', ['loggedUser' => $loggedUser, 'products' => $products, 'name' => $filter_name]);
    }

    public function create(AuthService $authService)
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        return view('product.create', ['loggedUser' => $loggedUser]);
    }

    public function store(ProductCreateRequest $request, ProductService $productService)
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        $result = [];

        try {
            $data = $request->only([
                'name',
                'description',
                'image_upload',
                'quantity',
                'cost_price',
                'sales_price',
                'status'
            ]);
            
            $extension = $request->file("image_upload")->extension();
            $filename = (time().".".$extension);

            $data['image'] = $filename;

            $productService->create($data);

            $request->file("image_upload")->move(public_path("img/products"), $filename);

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

    public function edit($id, ProductIndexRequest $productIndexRequest, AuthService $authService, ProductService $productService)
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        $result = [];

        try {
            $product = $productService->getById($id);
            $product['current_page'] = $productIndexRequest->query('page', 1);

            if ($product) return view('product.edit', ['loggedUser' => $loggedUser, 'product' => $product]);

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

    public function update($id, ProductUpdateRequest $request, ProductService $productService)
    {
        $result = [];

        try {
            $data = $request->only([
                'name',
                'description',
                'image_upload',
                'quantity',
                'cost_price',
                'sales_price',
                'status'
            ]);

            $currentPage = $request->query('page', 1);

            if ($request->file("image_upload")) {
                $extension = $request->file("image_upload")->extension();
                $filename = time().".".$extension;
            } else {
                $filename = '';                
            }

            $data['image'] = $filename;

            $productService->update($data, $id);

            if ($filename != '') $request->file("image_upload")->move(public_path("img/products"), $filename);

            return redirect()->route('product-index', ['page' => $currentPage])->withSuccess('Produto alterado com sucesso...');
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

    public function destroy($id, ProductIndexRequest $productIndexRequest, AuthService $authService, ProductService $productService)
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        $result = [];

        try {
            $product = $productService->getById($id);
            $product['current_page'] = $productIndexRequest->query('page', 1);

            if ($product) return view('product.destroy', ['loggedUser' => $loggedUser, 'product' => $product]);

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

    public function delete($id, ProductIndexRequest $productIndexRequest, ProductService $productService)
    {
        $result = [];

        try {
            $currentPage = $productIndexRequest->query('page', 1);

            $productService->delete($id);

            return redirect()->route('product-index', ['page' => $currentPage])->withSuccess('Produto excluído com sucesso...');
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

    public function show($id, ProductIndexRequest $productIndexRequest, AuthService $authService, ProductService $productService)
    {
        $loggedUser = $authService->getById(session('LoggedUser'));

        $result = [];

        try {
            $product = $productService->getById($id);
            $product['current_page'] = $productIndexRequest->query('page', 1);

            if ($product) return view('product.show', ['loggedUser' => $loggedUser, 'product' => $product]);

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
