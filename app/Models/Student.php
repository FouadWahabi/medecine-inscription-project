<?php

/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:03
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'Student';
    protected $primaryKey = 'id_student';
    protected $fillable = [
        'last_name', 'first_name', 'second_name', 'sex', 'birthday', 'city_id', 'cin', 'passport', 'phone',
        'adress_id', 'mobile', 'mail', 'bac_id', 'study_access_year', 'oriented', 'origin_university', 'password', 'valid',
        'qr_code', 'login', 'id_fonction', 'id_doctaurat'
    ];

    protected $hidden = [
        'password'
    ];
    public $timestamps = false;

    public function study()
    {
        return $this->hasMany('App\Models\Study', 'study_id');
    }

}