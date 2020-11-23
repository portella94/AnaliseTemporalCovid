<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeitoOcupacao extends Model
{
    protected $table = 'leito_ocupacao';
    protected $primaryKey = 'municipio';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'estadoSigla',
        'municipio',
        'dataNotificacaoOcupacao',
        'altas',
        'obitos'
    ];
}
