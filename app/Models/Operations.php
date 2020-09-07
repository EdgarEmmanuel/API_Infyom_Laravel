<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Operations
 * @package App\Models
 * @version August 30, 2020, 2:09 pm UTC
 *
 * @property integer $montant
 * @property string $type
 * @property string $date
 * @property integer $compte_id
 */
class Operations extends Model
{
    use SoftDeletes;

    public $table = 'operations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'montant',
        'type',
        'date',
        'compte_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'montant' => 'integer',
        'type' => 'string',
        'date' => 'string',
        'compte_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'montant' => 'required',
        'type' => 'required',
        'date' => 'required',
        'compte_id' => 'required'
    ];

    
}
