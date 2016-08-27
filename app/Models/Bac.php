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
    protected $fillable = ['year', 'id_type', 'id_mention', 'average', 'school', 'id_student'];

    public $timestamps = false;
    protected $hidden = ['id_type', 'id_mention', 'id_student'];

    public function type()
    {
        return $this->belongsTo('\App\Models\Type', 'id_type');
    }

    public function mention()
    {
        return $this->belongsTo('\App\Models\Mention', 'id_mention');
    }
}