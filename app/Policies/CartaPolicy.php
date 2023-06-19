<?php

namespace App\Policies;

use App\Models\Carta;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class CartaPolicy
{
    
    // public function viewAny(User $user): bool
    // {
        
    // }
    public function eliminar(User $user, Carta $carta): bool
    {
        if($carta->estado==='Enviado'){
            return true;
        }
        return false;
    }


    // responder la carta por parte del niño
    public function responderCartaXninio(User $user, Carta $carta): bool
    {
        if($carta->estado==='Respondida'){
            return false;
        }
        return true;
    }
}
