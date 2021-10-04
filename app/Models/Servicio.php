<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $table='servicios';
    protected $fillable=['serv_descripcion', 'impu_codigo'];
    protected $guarded = ['id'];

    //un servicio puede tener un solo impuesto
    public function Impuesto()
    {
        return $this->belongsTo(Impuesto::class, 'impu_codigo');
    }

}
