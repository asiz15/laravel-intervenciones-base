<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beneficiario extends Model
{
    use HasFactory;
    protected $table = "beneficiarios";

    // Podemos esconder ciertos campos para recibir una respuesta más limpia. Antes recibiamos el campo ciudad_id y categoria_id
    // Lo que es redundante ya que podemos acceder a los mismos valores (ciudad->id y categoria->id) cuando usamos with() 
    // sin perder las relaciones cuando no pasamos el campo en el select
    
    // Pasamos de esto:
     /* {
        "id": 1,
        "nombres": "Alex F",
        "apellidos": "Silva Z",
        "dni": "5454242424",
        "ciudad_id": 1, <--*** Nota que este valor es el mismo que ciudad.id 
        "categoria_id": 1, <--*** Nota que este valor es el mismo que categoria.id
        "ciudad": {
            "id": 1, ***
            "nombre": "Santiago"
        },
        "categoria": {
            "id": 1, ***
            "nombre": "Categoria A"
        }
    }, */

    /* A esto: 
    {
        "id": 1,
        "nombres": "Alex F",
        "apellidos": "Silva Z",
        "dni": "5454242424",
        "ciudad": {
            "id": 1,
            "nombre": "Santiago"
        },
        "categoria": {
            "id": 1,
            "nombre": "Categoria A"
        }
    },
    
    */

    // Que campos escondemos
    protected $hidden = ['ciudad_id', 'categoria_id'];

    public function ciudad() {
        // Relacion entre la tabla Beneficiario y ciudad. hasOne porque 1 Beneficiario -> 1 Ciudad.
        // Solo es necesario declarar esta relación (NO declarar la relación en el modelo Ciudad, era un paso que haciamos de más.)
        // Nota que ahora como segundo parametro de la funcion hasOne pasamos el id, que hace referencia al id en la tabla ciudades.
        
        return $this->hasOne('App\Models\Ciudad', 'id');
    }
    public function categoria() {
        // Relacion entre la tabla Beneficiario y ciudad. hasOne porque 1 Beneficiario -> 1 Categoría.
        // Solo es necesario declarar esta relación (NO declarar la relación en el modelo Categoria, era un paso que haciamos de más.)
        // Nota que ahora como segundo parametro de la funcion hasOne pasamos el id, que hace referencia al id en la tabla categorias.

        return $this->hasOne('App\Models\Categoria', 'id');
    }
    
}

