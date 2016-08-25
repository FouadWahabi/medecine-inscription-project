<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:26
 */

namespace App\Models;


class Fonction
{
    protected $table = 'Fonction';
    protected $primaryKey = 'id_fonction';
    protected $fillable = ['nature', 'employer', 'date_of_inauguration', 'id_adress'];

    public $timestamps = false;
}