<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class detalle extends Model
{
    //

    public $timestamps=false;
    protected $table='facturas_detalle';
    protected $primaryKey='fad_id';

    protected $fillable=[
    'fac_id',
    'prod_id',
    'fad_cantidad',
    'fad_vu',
    'fad_vt' ];

}
