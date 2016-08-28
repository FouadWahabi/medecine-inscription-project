<?php
/**
 * Created by PhpStorm.
 * User: Abbes
 * Date: 26/08/2016
 * Time: 19:16
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Doctaurat extends Model
{
    protected $table = 'Doctaurat';
    protected $primaryKey = 'id_doctaurat';
    protected $fillable = ['date_of_pitch', 'numero', 'id_student', 'id_university', 'id_mention'];

    public $timestamps = false;

    protected $hidden = ['id_student', 'id_university', 'id_mention'];

    public function university()
    {
        return $this->belongsTo('\App\Models\University', 'id_university');
    }

    public function mention()
    {
        return $this->belongsTo('\App\Models\Mention', 'id_mention');
    }
}