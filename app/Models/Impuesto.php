<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Impuesto extends Model
{
    use HasFactory;

    protected $table='impuestos';
    protected $fillable=['impu_descripcion'];
    protected $guarded = ['id'];

    //un impuesto puede pertenecer a muchos servicios
    public function Servicio()
    {
        return $this->hasMany(Servicio::class);
    }


}
