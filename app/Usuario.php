<?php

namespace rrhh;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table= 'usuario';
    protected $primaryKey= 'cod';
    public $timestamps= false;

    protected $fillable = [
    	'nombre',
    	'clave',
    	'habilitado'

    ];

    protected $guarded=[

    ];
}
