@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('ubicaciones.edit',$u) }}
@endsection



@section('content')
<form action="{{ route('ubicaciones.update',$u) }}" method="POST" id="formUser" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="card">
       
        <div class="card-body row">
            <div class="fw-bold border-bottom pb-2 mb-3">DATOS</div>
            
            <div class="col-md-12 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-toggle-left"></i>
                    </div>
                    <select class="form-select @error('tipo') is-invalid @enderror" name="tipo" required>
                       @foreach ($tipos as $ti)
                           <option value="{{ $ti->id }}" {{ old('tipo',$u->tipo_id)===$ti->id?'selected':'' }}>{{ $ti->nombre }}</option>
                       @endforeach
                    </select>

                    <label>Tipo<i class="text-danger">*</i></label>
                    @error('tipo')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-user"></i>
                    </div>
                    <input name="nombre" value="{{ old('nombre',$u->nombre) }}" type="text" class="form-control @error('nombre') is-invalid @enderror" required autofocus>
                    <label>Nombre<i class="text-danger">*</i></label>
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>



@push('scripts')
    <script>
   
        $('#formUser').validate();
         
    </script>
@endpush
@endsection
