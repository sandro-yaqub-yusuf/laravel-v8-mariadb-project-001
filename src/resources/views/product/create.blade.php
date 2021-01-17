@extends('template')

@section('title', 'Laravel v8.x - Novo Produto')
    
@section('content')
  <!-- BEGIN Content Header -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Novo Produto</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('produtos.index') }}">Produtos</a></li>
            <li class="breadcrumb-item active">Novo</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <!-- END Content Header -->

  <!-- BEGIN Content -->
  <section class="content">
    <div class="container-fluid">
      <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('produtos.store') }}">
        @csrf
        <div class="card-body">
          @include('includes.alerts')
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Produto</label>
            <div class="col-sm-10">
              <input type="text" id="name" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" />
              @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Descrição</label>
            <div class="col-sm-10">
              <textarea id="description" name="description" cols="40" rows="5" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
              @error('description') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Imagem Upload</label>
            <div class="col-sm-10">
              <div class="custom-file">
                <input type="file" id="ImagemUpload" name="image" class="custom-file-input @error('image') is-invalid @enderror" />
                <label data-browse="Procurar" style="width: 400px" class="custom-file-label" for="ImagemUpload"></label>
                <label style="display: none" id="img_nome"></label>
              </div>
              @error('image') <span class="text-danger">{{ $message }}</span> @enderror
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
                <input type="text" id="quantity" name="quantity" value="{{ old('quantity') }}" class="form-control @error('quantity') is-invalid @enderror" />
              </div>
              @error('quantity') <span class="text-danger">{{ $message }}</span> @enderror
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
                <input type="text" id="cost_price" name="cost_price" value="{{ old('cost_price') }}" class="form-control @error('cost_price') is-invalid @enderror" />
              </div>
              @error('cost_price') <span class="text-danger">{{ $message }}</span> @enderror
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
                <input type="text" id="sales_price" name="sales_price" value="{{ old('sales_price') }}" class="form-control @error('sales_price') is-invalid @enderror" />
              </div>
              @error('sales_price') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Situação</label>
            <div class="col-sm-10">
              <select id="ddlSituacao" name="status">
                <option selected="selected" value="A">Ativado</option>
                <option value="D">Desativado</option>
              </select>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <input type="submit" value="Cadastrar" class="btn btn-primary" />
          <a class="btn btn-info float-right" href="{{ route('produtos.index') }}">Voltar</a>
        </div>
      </form>
    </div>
  </section>
  <!-- END Content -->

  <!-- BEGIN Scripts Content -->
  <script src="{{ asset('lib/jquery/jquery.min.js') }}"></script>
  <script>
    $("#ImagemUpload").change(function () {
      $("#img_nome").text(this.files[0].name);
      $("#img_nome")[0].style.display = 'block';
    });
  </script>  
  <!-- END Scripts Content -->
@endsection
