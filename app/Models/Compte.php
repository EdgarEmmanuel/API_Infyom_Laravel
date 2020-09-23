<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Compte
 * @package App\Models
 * @version August 30, 2020, 2:02 pm UTC
 *
 * @property string $numeroCompte
 * @property string $dateOuverture
 * @property integer $montant
 * @property integer $client_id
 */
class Compte extends Model
{
    use SoftDeletes;

    public $table = 'comptes';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'numeroCompte',
        'dateOuverture',
        'montant',
        'client_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'numeroCompte' => 'string',
        'dateOuverture' => 'string',
        'montant' => 'integer',
        'client_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'numeroCompte' => 'required',
        'dateOuverture' => 'required',
        'montant' => 'required',
        'client_id' => 'required'
    ];

    
}
