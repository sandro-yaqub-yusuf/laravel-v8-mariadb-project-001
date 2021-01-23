@extends('template')

@section('title', 'Laravel v8.x - Produtos')
    
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
          <form class="form-horizontal" method="get" action="{{ route('product-index') }}">
            <div class="form-group row">
              <div class="col-sm-1" style="margin-bottom: 10px;">
                <label for="Produto" class="col-form-label">Produto:</label>
              </div>
              <div class="col-sm-3" style="margin-bottom: 10px;">
                <input type="text" name="filter" value="{{ $filter }}" style="width: 250px;">
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
                <th>Código</th>
                <th>Produto</th>
                <th>Quantidade</th>
                <th>Preço de Custo</th>
                <th>Preço de Venda</th>
                <th>Situação</th>
                <th>Ações</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($products as $product)
                <tr>
                  <td>{{ $product->id }}</td>
                  <td>{{ $product->name }}</td>
                  <td>{{ $product->quantity }}</td>
                  <td>{{ $product->cost_price }}</td>
                  <td>{{ $product->sales_price }}</td>
                  <td>{{ $product->status }}</td>
                  <td class="text-right">
                    <a class="btn btn-warning" href="{{ route('product-show', ['id' => $product->id]) }}"><span class="fa fa-search"></span></a>
                    <a class="btn btn-info" href="{{ route('product-edit', ['id' => $product->id]) }}"><span class="fa fa-pencil-alt"></span></a>
                    <a class="btn btn-danger" href="#"><span class="fa fa-trash"></span></a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>  
      </div>
      <div class="row">
        <div class="col-sm-12">
          {{ $products->links() }}
        </div>
      </div>
    </div>
  </section>
  <!-- END Content -->
@endsection
