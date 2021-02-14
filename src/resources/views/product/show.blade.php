@extends('template')

@section('title', 'Laravel v8.x - Novo Produto')
    
@section('content')
  <!-- BEGIN Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Consulta do Produto</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product-index') }}">Produtos</a></li>
            <li class="breadcrumb-item active">Consulta</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- END Content Header -->

  <!-- BEGIN Content -->
  <section class="content">
    <div class="container-fluid">
      <div class="card-body">
        @include('includes.alerts')
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Produto</label>
          <div class="col-sm-10">
            <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control" disabled />
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Descrição</label>
          <div class="col-sm-10">
            <textarea id="description" name="description" cols="40" rows="5" class="form-control" disabled>{{ $product->description }}</textarea>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Imagem Upload</label>
          <div class="col-sm-10">
            <img src="{{ url('img/products/'.$product->image) }}">
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Quantidade</label>
          <div class="col-sm-10 input-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-boxes"></i>
                </span>
              </div>
              <input type="text" id="quantity" name="quantity" value="{{ $product->quantity }}" class="form-control" disabled />
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Preço de Custo</label>
          <div class="col-sm-10 input-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-money-bill-wave"></i>
                </span>
              </div>
              <input type="text" id="cost_price" name="cost_price" value="{{ $product->cost_price }}" class="form-control" disabled />
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Preço de Venda</label>
          <div class="col-sm-10 input-group">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">
                  <i class="fas fa-money-bill-wave"></i>
                </span>
              </div>
              <input type="text" id="sales_price" name="sales_price" value="{{ $product->sales_price }}" class="form-control" disabled />
            </div>
          </div>
        </div>
        <div class="form-group row">
          <label class="col-sm-2 col-form-label">Situação</label>
          <div class="col-sm-10">
            <select id="ddlSituacao" name="status" disabled>
              <option {{ ($product->status == 'A' ? 'selected' : '') }} value="A">Ativado</option>
              <option {{ ($product->status == 'D' ? 'selected' : '') }} value="D">Desativado</option>
            </select>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <a class="btn btn-info float-left" href="{{ route('product-index', ['page' => $product->current_page]) }}">Voltar</a>
      </div>
    </div>
  </section>
  <!-- END Content -->
@endsection
