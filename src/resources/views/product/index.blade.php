@inject('maskHelper', 'App\Helpers\MaskHelper')

@extends('template')

@section('title', 'LARAVEL v8.x - Projeto 001 - Produtos')
    
@section('content')
  <!-- BEGIN Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Lista de Produtos</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item active">Produtos</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- END Content Header -->

  <!-- BEGIN Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          @include('includes.alerts')
        </div>
        <div class="col-sm-12">
          <p><a class="btn btn-info" href="{{ route('product-create') }}">Novo Produto</a></p>
        </div>
        <div class="col-md-12" style="margin-top: 10px;">
          <form class="form-horizontal" method="GET" action="{{ route('product-index') }}">
            @csrf
            @method('GET')
            <div class="form-group row">
              <div class="col-sm-1" style="margin-bottom: 10px;">
                <label for="Produto" class="col-form-label">Produto:</label>
              </div>
              <div class="col-sm-3" style="margin-bottom: 10px;">
                <input type="text" name="name" value="{{ $name }}" style="width: 250px;">
              </div>
              <div class="col-sm-2" style="margin-bottom: 10px;">
                <input class="btn btn-secondary" type="submit" value="PESQUISAR">
              </div>
              <div class="col-sm-2" style="margin-bottom: 10px;">
                <a class="btn btn-secondary" href="{{ route('product-index') }}">LISTAR TODOS</a>
              </div>
            </div>
          </form>
        </div>
        <div class="col-md-12 table-responsive p-0">
          <table class="table table-hover table-striped text-nowrap">
            <thead class="thead-dark">
              <tr>
                <th width="10%">Código</th>
                <th width="40%">Produto</th>
                <th width="10%">Quantidade</th>
                <th width="10%">Preço de Custo</th>
                <th width="10%">Preço de Venda</th>
                <th width="10%">Situação</th>
                <th width="10%">Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td width="10%">{{ $product->id }}</td>
                  <td width="42%">{{ $product->name }}</td>
                  <td width="10%">{{ $product->quantity }}</td>
                  <td width="10%">{{ $maskHelper->currency('R$', $product->cost_price) }}</td>
                  <td width="10%">{{ $maskHelper->currency('R$', $product->sales_price) }}</td>
                  <td width="10%">{!! $maskHelper->status($product->status) !!}</td>
                  <td class="text-right" width="8%">
                    <a class="btn-sm btn-warning" href="{{ route('product-show', ['id' => $product->id, 'page' => $products->currentPage() ]) }}"><span class="fa fa-search"></span></a>
                    <a class="btn-sm btn-info" href="{{ route('product-edit', ['id' => $product->id, 'page' => $products->currentPage() ]) }}"><span class="fa fa-pencil-alt"></span></a>
                    <a class="btn-sm btn-danger" href="{{ route('product-destroy', ['id' => $product->id, 'page' => $products->currentPage() ]) }}"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>  
      </div>
      <div class="row">
        <div class="col-sm-12">
          {{ $products->onEachSide(5)->links() }}
        </div>
      </div>
    </div>
  </section>
  <!-- END Content -->
@endsection
