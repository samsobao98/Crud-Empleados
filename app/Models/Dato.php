<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Datos
 *
 * @property $id
 * @property $nombre
 * @property $apellido
 * @property $email
 * @property $telefono
 * @property $direccion
 * @property $fecha_ingreso
 * @property $puesto_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Puesto $puesto
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Dato extends Model
{
    protected $perPage = 20;
    protected $table = 'datos';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'apellido', 'email', 'telefono', 'direccion', 'fecha_ingreso', 'puesto_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function puesto()
    {
        return $this->belongsTo(\App\Models\Puesto::class, 'puesto_id', 'id');
    }
}
