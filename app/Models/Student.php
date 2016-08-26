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
        'last_name', 'first_name', 'second_name', 'sex', 'birthday', 'id_city', 'cin', 'passport', 'phone',
        'mobile', 'mail', 'study_access_year', 'oriented', 'origin_university', 'password', 'valid',
        'qr_code', 'login'
    ];

    protected $hidden = [
        'password', 'id_adress'
    ];
    public $timestamps = false;

    public function study()
    {
        return $this->hasMany('App\Models\Study', 'study_id');
    }

    public function adress()
    {
        return $this->belongsTo('App\Models\Adress', 'id_adress');
    }

    public function bac()
    {
        return $this->belongsTo('App\Models\Bac', 'id_bac');
    }
}