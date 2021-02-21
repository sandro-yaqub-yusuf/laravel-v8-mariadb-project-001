@extends('template')

@section('title', 'LARAVEL v8.x - Projeto 001 - Alteração do Produto')
    
@section('content')
  <!-- BEGIN Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Alteração do Produto</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product-index') }}">Produtos</a></li>
            <li class="breadcrumb-item active">Alteração</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- END Content Header -->

  <!-- BEGIN Content -->
  <section class="content">
    <div class="container-fluid">
      <form id="product_form" class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ route('product-update', ['id' => $product->id, 'page' => $product->current_page]) }}">
        @csrf
        @method('PUT')
        <div class="card-body">
          @include('includes.alerts')
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Produto</label>
            <div class="col-sm-10">
              <input type="text" id="name" name="name" value="{{ $product->name }}" class="form-control @error('name') is-invalid @enderror" />
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Descrição</label>
            <div class="col-sm-10">
              <textarea id="description" name="description" cols="40" rows="5" class="form-control @error('description') is-invalid @enderror">{{ $product->description }}</textarea>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagem Upload</label>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" id="image_upload" name="image_upload" class="custom-file-input" style="flex: 0 0 50%;" />
                <label data-browse="Procurar" style="width: 500px" class="custom-file-label"></label>
                <label style="display: block" id="img_name"></label>
              </div>
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
                <input type="text" id="quantity" name="quantity" value="{{ $product->quantity }}" class="form-control @error('quantity') is-invalid @enderror mr-2" style="flex: 0 0 50%;" />
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
                <input type="text" id="cost_price" name="cost_price" value="{{ $product->cost_price }}" class="form-control @error('cost_price') is-invalid @enderror mr-2" style="flex: 0 0 50%;" />
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
                <input type="text" id="sales_price" name="sales_price" value="{{ $product->sales_price }}" class="form-control @error('sales_price') is-invalid @enderror mr-2" style="flex: 0 0 50%;" />
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Situação</label>
            <div class="col-sm-10">
              <select id="ddlSituacao" name="status">
                <option {{ ($product->status == 'A' ? 'selected' : '') }} value="A">Ativado</option>
                <option {{ ($product->status == 'D' ? 'selected' : '') }} value="D">Desativado</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <button type="submit" class="btn btn-primary">Alterar</button>
          <a class="btn btn-info float-right" href="{{ route('product-index', ['page' => $product->current_page]) }}">Voltar</a>
        </div>
      </form>
    </div>
  </section>
  <!-- END Content -->

  <!-- BEGIN Scripts Content -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('lib/jquery-validation/jquery.validate.min.js') }}"></script>
  <script src="{{ asset('lib/jquery-validation/localization/messages_pt_BR.min.js') }}"></script>
  <script>
    jQuery(function($) {
      if ($("#product_form").length > 0) {
        $("#product_form").validate({
          rules: {
            name: { required: true, minlength: 2, maxlength: 255 },
            description: { required: true, minlength: 2 },
            image_upload: { required: false, minlength: 4, maxlength: 255 },
            quantity: { required: true, min: 0 },
            cost_price: { required: true, min: 0 },
            sales_price: { required: true, min: 0 }
          }
        });
      }
      
      $("#img_name").text('{{ $product->image }}');

      $("#image_upload").change(function () {
        $("#img_name").text(this.files[0].name);
      });
    });
  </script>  
  <!-- END Scripts Content -->
@endsection
