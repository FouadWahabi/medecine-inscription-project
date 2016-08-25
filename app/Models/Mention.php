<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:14
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    protected $table = 'Mention';
    protected $primaryKey = 'id_mention';
    protected $fillable = ['label'];

    public $timestamps = false;
}