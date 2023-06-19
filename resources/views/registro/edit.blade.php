@extends('layouts.app')

@section('breadcrumbs')
{{ Breadcrumbs::render('registro.edit',$registro) }}
@endsection



@section('content')
<form action="{{ route('registro.update',$registro) }}" method="POST" id="formUser" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="card">
       
        <div class="card-body row">
            <div class="fw-bold border-bottom pb-2 mb-3">DATOS</div>
            
            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-toggle-left"></i>
                    </div>
                    <select id="tipo" onchange="cambiarTipo(this)" class="form-select @error('tipo') is-invalid @enderror" name="tipo" required>
                       @foreach ($tipos as $ti)
                           <option value="{{ $ti->id }}" {{ old('tipo',$registro->ubicacion->tipo_id)===$ti->id?'selected':'' }}>{{ $ti->nombre }}</option>
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

            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-toggle-left"></i>
                    </div>
                    <select id="ubicacion" class="form-select @error('ubicacion') is-invalid @enderror" name="ubicacion" required>
                      
                    </select>

                    <label>Ubicación<i class="text-danger">*</i></label>
                    @error('ubicacion')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-user"></i>
                    </div>
                    <input name="troza" value="{{ old('troza',$registro->troza) }}" type="number" step="0.01" class="form-control @error('troza') is-invalid @enderror" required autofocus>
                    <label>Troza<i class="text-danger">*</i></label>
                    @error('troza')
                        <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6 mb-1">
                <div class="form-floating form-control-feedback form-control-feedback-start">
                    <div class="form-control-feedback-icon">
                        <i class="ph-user"></i>
                    </div>
                    <input name="carga" value="{{ old('carga',$registro->carga) }}" type="number" step="0.01" class="form-control @error('carga') is-invalid @enderror" required>
                    <label>Carga<i class="text-danger">*</i></label>
                    @error('carga')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-1">
                <p class="fw-semibold">SELECCIONE NÚMERO DE ALTURA</p>
                <div class="border p-3 rounded">
                    @foreach ([1,2,3,4,5,6,7] as $numero)
                    <div class="form-check form-check-inline">
                        <input type="radio" onchange="cargarFilas(this);" class="form-check-input" value="{{ $numero }}" name="numero" id="numero_{{ $numero }}" {{ $numero===$registro->numero?'checked':'' }}>
                        <label class="form-check-label" for="numero_{{ $numero }}">{{ $numero }}</label>
                    </div>
                    @endforeach
                </div>
            </div>
        
            <div class="table-responsive mt-2">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">N°</th>
                            <th scope="col">ALTURA A</th>
                            <th scope="col">ALTURA B</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ([1,2,3,4,5,6,7] as $fi)
                        <tr class="filas" id="fila_{{ $fi }}">
                            <td scope="row">
                                {{ $fi }}
                            </td>
                            <td>
                                @switch($fi)
                                    @case(1)
                                        <input type="number" value="{{ $registro->altura_a_1 }}" name="altura_a_{{ $fi }}" step="0.01" class="form-control" id="altura_a_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(2)
                                        <input type="number" value="{{ $registro->altura_a_2 }}" name="altura_a_{{ $fi }}" step="0.01" class="form-control" id="altura_a_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(3)
                                        <input type="number" value="{{ $registro->altura_a_3 }}" name="altura_a_{{ $fi }}" step="0.01" class="form-control" id="altura_a_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(4)
                                        <input type="number" value="{{ $registro->altura_a_4 }}" name="altura_a_{{ $fi }}" step="0.01" class="form-control" id="altura_a_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(5)
                                        <input type="number" value="{{ $registro->altura_a_5 }}" name="altura_a_{{ $fi }}" step="0.01" class="form-control" id="altura_a_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(6)
                                        <input type="number" value="{{ $registro->altura_a_6 }}" name="altura_a_{{ $fi }}" step="0.01" class="form-control" id="altura_a_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(7)
                                        <input type="number" value="{{ $registro->altura_a_7 }}" name="altura_a_{{ $fi }}" step="0.01" class="form-control" id="altura_a_{{ $fi }}" placeholder="" required>
                                        @break
                                    @default
                                @endswitch
                            </td>
                            <td>
                                
                                @switch($fi)
                                    @case(1)
                                        <input type="number" value="{{ $registro->altura_b_1 }}" name="altura_b_{{ $fi }}" step="0.01" class="form-control" id="altura_b_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(2)
                                        <input type="number" value="{{ $registro->altura_b_2 }}" name="altura_b_{{ $fi }}" step="0.01" class="form-control" id="altura_b_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(3)
                                        <input type="number" value="{{ $registro->altura_b_3 }}" name="altura_b_{{ $fi }}" step="0.01" class="form-control" id="altura_b_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(4)
                                        <input type="number" value="{{ $registro->altura_b_4 }}" name="altura_b_{{ $fi }}" step="0.01" class="form-control" id="altura_b_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(5)
                                        <input type="number" value="{{ $registro->altura_b_5 }}" name="altura_b_{{ $fi }}" step="0.01" class="form-control" id="altura_b_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(6)
                                        <input type="number" value="{{ $registro->altura_b_6 }}" name="altura_b_{{ $fi }}" step="0.01" class="form-control" id="altura_b_{{ $fi }}" placeholder="" required>
                                        @break
                                    @case(7)
                                        <input type="number" value="{{ $registro->altura_b_7 }}" name="altura_b_{{ $fi }}" step="0.01" class="form-control" id="altura_b_{{ $fi }}" placeholder="" required>
                                        @break
                                    @default
                                @endswitch

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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

        var tipo=$( "#tipo option:selected" ).val();
        var id_ubicacion={{ $registro->ubicacion_id }};
        

        function obtenerUbicaciones(idTipo){
            var url = '{{ route("registros.obtener-ubicaciones", ":id") }}';
            url = url.replace(':id', idTipo);
            
            $.get(url, function( data ) {
                $.each(data, function(k, v) {
                    $('#ubicacion').append($('<option>').val(v.id).text(v.nombre).attr('selected',v.id===id_ubicacion));
                });
            });
        }
        
        function cambiarTipo(arg){
            $("#ubicacion").empty()
            obtenerUbicaciones($(arg).val())
        }

        obtenerUbicaciones(tipo);

        

        function cargarFilas(arg){
            $('.filas').each(function(i,v){
                if($(arg).val()<=i){
                    $(this).hide()
                }else{
                    $(this).show()
                }
            })
        }
        
        var numero=$('input[name="numero"]:checked');
        cargarFilas(numero)
    </script>
@endpush
@endsection
