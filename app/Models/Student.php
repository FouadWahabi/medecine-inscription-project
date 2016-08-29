<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Student extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;

    protected $table = 'Student';
    protected $primaryKey = 'id_student';
    protected $fillable = [
        'last_name', 'first_name', 'second_name', 'sex', 'birthday', 'id_city', 'cin', 'passport', 'phone',
        'mobile', 'email', 'study_access_year', 'oriented', 'origin_university', 'password', 'valid',
        'qr_code', 'login', 'confirmation_code', 'valid_from_administration', 'img', 'valid_dossier', "nom_de_famille"
    ];

    protected $hidden = [
        'password', 'confirmation_code'
    ];
    public $timestamps = false;

    public function studies()
    {
        return $this->hasMany('App\Models\Study', 'id_student');
    }

    public function adress()
    {
        return $this->hasOne('App\Models\Adress', 'id_student');
    }

    public function bac()
    {
        return $this->hasOne('App\Models\Bac', 'id_student');
    }

    public function doctaurat()
    {
        return $this->hasOne('App\Models\Doctaurat', 'id_student');
    }

    public function fonction()
    {
        return $this->hasOne('App\Models\Fonction', 'id_student');
    }
}