<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:35
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Bac extends Model
{
    protected $table = 'Bac';
    protected $primaryKey = 'id_bac';
    protected $fillable = ['year', 'id_type', 'id_mention', 'average', 'school'];

    public $timestamps = false;
}