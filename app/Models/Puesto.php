<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Puesto
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $tipo_jornada_id
 * @property $created_at
 * @property $updated_at
 *
 * @property TipoJornada $tipoJornada
 * @property Dato[] $empleados
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Puesto extends Model
{
    protected $perPage = 20;
    protected $table = 'puestos';


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'descripcion', 'tipo_jornada_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tipoJornada()
    {
        return $this->belongsTo(\App\Models\TipoJornada::class, 'tipo_jornada_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function empleados()
    {
        return $this->hasMany(\App\Models\Dato::class, 'puesto_id', 'id');
    }
}
