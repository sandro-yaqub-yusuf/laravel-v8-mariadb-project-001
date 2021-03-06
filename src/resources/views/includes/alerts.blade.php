@if ($errors->any())
  <div class="form-group row alert alert-danger">
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

@if (isset($resultAction))
  <div class="form-group row alert alert-danger">
    <ul>
      @foreach ($resultAction['message'] as $key => $errors)
        @foreach ($errors as $error)
          <li>{{ $error }}</li>
        @endforeach    
      @endforeach
    </ul>
  </div>
@endif

@if (session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
@endif

@if (session('warning'))
	<div class="alert alert-warning">
		{{ session('warning') }}
	</div>
@endif

@if (session('danger'))
	<div class="alert alert-danger">
		{{ session('danger') }}
	</div>
@endif

<br/>
