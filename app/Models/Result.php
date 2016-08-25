<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:27
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $table = 'Result';
    protected $primaryKey = 'id_result';
    protected $fillable = ['label'];

    public $timestamps = false;
}