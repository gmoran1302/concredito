<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Prospecto
 *
 * @property $id
 * @property $nombre
 * @property $apellidoP
 * @property $apellidoM
 * @property $calle
 * @property $num
 * @property $col
 * @property $cp
 * @property $tel
 * @property $rfc
 * @property $obse
 * @property $estatus
 * @property $created_at
 * @property $updated_at
 * @property $deleted_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Prospecto extends Model
{
    use SoftDeletes;

    static $rules = [
		'nombre' => 'required',
		'apellidoP' => 'required',
		'calle' => 'required',
		'num' => 'required',
		'col' => 'required',
		'cp' => 'required',
		'tel' => 'required',
		'rfc' => 'required',
	
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','apellidoP','apellidoM','calle','num','col','cp','tel','rfc','obse','estatus'];
    protected $attributes = [
        'estatus' => 'enviado',
    ];


}
