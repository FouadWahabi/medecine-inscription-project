<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:25
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Adress extends Model
{
    protected $table = 'Adress';
    protected $primaryKey = 'id_adress';
    protected $fillable = ['ligne1', 'ligne2', 'postal_code', 'id_city','id_student','id_fonction'];

    protected $hidden = ['id_city'];
    public $timestamps = false;

    public function city()
    {
        $this->belongsTo('App\Models\City', 'id_city');
    }
}