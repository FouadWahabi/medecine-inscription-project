<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:12
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    protected $table = 'Study';
    protected $primaryKey = 'id_study';
    protected $fillable = ['year', 'id_result', 'id_level', 'id_university', 'id_student'];

    public $timestamps = false;
}