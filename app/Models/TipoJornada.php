<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoJornada
 *
 * @property $id
 * @property $nombre
 * @property $horas_semanales
 * @property $salario_base
 * @property $created_at
 * @property $updated_at
 *
 * @property Puesto[] $puestos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoJornada extends Model
{
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['nombre', 'horas_semanales', 'salario_base'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function puestos()
    {
        return $this->hasMany(\App\Models\Puesto::class, 'tipo_jornada_id', 'id');
    }
}
