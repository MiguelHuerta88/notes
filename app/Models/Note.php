<?php
/**
 * Created by PhpStorm.
 * User: MiguelHuerta
 * Date: 4/6/17
 * Time: 12:17 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Note extends Model
{
    /**
     * Table name
     * @var string
     */
    protected $table = 'notes';

    /**
     * Fillable array used for mass assignment
     *
     * @var array
     */
    protected $fillable = ['user_id', 'title', 'note'];

    /**
     * Rules for our model when we are validating
     * @var array
     */
    public $rules = [
        'user_id' => 'required|numeric',
        'title' => 'required|max:50',
        'note' => 'required|max:1000'
    ];
}