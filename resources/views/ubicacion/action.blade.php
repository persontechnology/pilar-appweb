<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>

        <div class="dropdown-menu dropdown-menu-end">
          
            <a href="{{ route('ubicaciones.edit',$u->id) }}" class="dropdown-item">
                <i class="ph ph-pencil-simple me-2"></i>
                Editar
            </a>

            <a href="{{ route('ubicaciones.destroy',$u->id) }}" data-msg="{{ $u->nombre }}" onclick="event.preventDefault(); eliminar(this)" class="dropdown-item">
                <i class="ph ph-trash me-2"></i>
                Eliminar
            </a>
            
        </div>
    </div>
</div>