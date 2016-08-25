<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:28
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'University';
    protected $primaryKey = 'id_university';
    protected $fillable = ['label'];

    public $timestamps = false;

}