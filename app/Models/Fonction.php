<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 25/08/2016
 * Time: 23:26
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Fonction extends Model
{
    protected $table = 'Fonction';
    protected $primaryKey = 'id_fonction';
    protected $fillable = ['nature', 'employer', 'date_of_inauguration', 'id_student'];

    public $timestamps = false;
    protected $hidden = ['id_student'];

    public function adress()
    {
        return $this->hasOne('App\Models\Adress', 'id_fonction');
    }
}