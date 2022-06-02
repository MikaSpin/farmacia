<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class facturas extends Model
{
    //
    public $timestamps=false;
    protected $table='facturas';
    protected $primaryKey='fac_id';

    protected $fillable=[

'fac_nombre',
'fac_cedula',
'fac_fecha',
'fac_total',
'fac_estado',
'fac_tipo_pago',

    ];

}
