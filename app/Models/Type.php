<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:15
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'Type';
    protected $primaryKey = 'id_type';
    protected $fillable = ['label'];

    public $timestamps = false;
}