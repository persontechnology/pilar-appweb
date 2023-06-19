@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('usuarios.create') }}
@endsection



@section('content')
<form action="{{ route('usuarios.store') }}" method="POST" id="formUser" autocomplete="off">
    @csrf
    <div class="card">
       
        <div class="card-body row">
            <div class="fw-bold border-bottom pb-2 mb-3">DATOS PERSONALES</div>
            
            <div class="col-md-4 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-user"></i>
                    </div>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control @error('name') is-invalid @enderror" required >
                    <label>Nombre de usuario<i class="text-danger">*</i></label>
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-envelope-simple"></i>
                    </div>
                    <input name="email" value="{{ old('email') }}" type="email" class="form-control @error('email') is-invalid @enderror" required>
                    <label>Email<i class="text-danger">*</i></label>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>
            <div class="col-md-4 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-lock-simple"></i>
                    </div>
                    <input name="password" value="{{ old('password') }}" type="password" class="form-control @error('password') is-invalid @enderror" required>
                    <label>Contraseña<i class="text-danger">*</i></label>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            
            <div class="col-md-2 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-toggle-left"></i>
                    </div>
                    <select class="form-select @error('estado') is-invalid @enderror" name="estado" required>
                        <option value=""></option>
                        <option value="ACTIVO" {{ old('estado')=='ACTIVO'?'selected':'' }}>ACTIVO</option>
                        <option value="INACTIVO" {{ old('estado')=='INACTIVO'?'selected':'' }}>INACTIVO</option>
                    </select>

                    <label>Estado<i class="text-danger">*</i></label>
                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>
            
            {{-- <div class="col-md-12">
                <div class="mb-3">
                    <p class="fw-semibold">Roles<i class="text-danger">*</i></p>

                    @if ($roles->count()>0)
                        <div class="border p-3 rounded">
                            @foreach ($roles as $rol)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" id="rol-{{ $rol->id }}" name="roles[{{ $rol->id }}]" {{ old('roles.'.$rol->id)==$rol->id ?'checked':'' }} value="{{ $rol->id }}" type="checkbox">
                                    <label class="form-check-label" for="rol-{{ $rol->id }}">{{ $rol->name }}</label>
                                </div>    
                            @endforeach
                                
                        </div>
                    @else
                        @include('sections.alert',['type'=>'primary','msg'=>'No existe roles para crear usuario.'])
                    @endif
                </div>
            </div> --}}
          
           
        </div>
        <div class="card-footer text-muted">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    </div>
</form>



@push('scripts')
    <script>
   
        $('#formUser').validate({
            rules: {
                identificacion: {
                    remote: {
                        url: "{{ route('validarec') }}",
                        type: "post",
                        data: {
                            identificacion: function() {
                                return $( "#identificacion" ).val();
                            },
                            tipo:function(){
                                return $( "#identificacion" ).val();
                            }
                        }
                    }               
                },
                identificacion_conyuge: {
                    remote: {
                        url: "{{ route('validarec') }}",
                        type: "post",
                        data: {
                            identificacion: function() {
                                return $( "#identificacion_conyuge" ).val();
                            },
                            tipo:function(){
                                return $( "#identificacion_conyuge" ).val();
                            }
                        }
                    }               
                },
                identificacion_representante: {
                    remote: {
                        url: "{{ route('validarec') }}",
                        type: "post",
                        data: {
                            identificacion: function() {
                                return $( "#identificacion_representante" ).val();
                            },
                            tipo:function(){
                                return $( "#identificacion_representante" ).val();
                            }
                        }
                    }               
                }
            },
            messages:{
                identificacion: {
                    remote: "Identificación incorrecta"
                },
                identificacion_conyuge: {
                    remote: "Identificación incorrecta"
                },
                identificacion_representante: {
                    remote: "Identificación  incorrecta"
                }
            }
        });
         
    </script>
@endpush
@endsection
