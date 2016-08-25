<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:27
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $table = 'Level';
    protected $primaryKey = 'id_level';
    protected $fillable = ['label'];

    public $timestamps = false;
}