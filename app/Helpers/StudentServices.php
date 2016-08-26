<?php

namespace App\Helpers;

use App\Models\Adress;
use App\Models\Bac;
use App\Models\Student;

class StudentServices
{

    public function getAllStudents()
    {
        return Student::with(['adress', 'bac'])->All();
    }

    public function getStudentById($student_id)
    {
        return Student::with(['adress', 'bac'])->find($student_id);
    }

    public function store($data)
    {
        $student = new Student();
        $student->first_name = $data["first_name"];
        $student->last_name = $data["last_name"];
        $student->second_name = $data["second_name"];
        $student->sex = $data["sex"];
        $student->birthday = $data["birthday"];
        $student->cin = $data["cin"];
        $student->passport = $data["passport"];
        $student->phone = $data["phone"];
        $student->mobile = $data["mobile"];
        $student->mail = $data["mail"];
        $student->study_access_year = $data["study_access_year"];
        $student->oriented = $data["oriented"];
        $student->origin_university = $data["origin_university"];

        //adress
        $adress = new Adress();
        $adress->postal_code = $data["postal_code"];
        $adress->ligne1 = $data["label_adress"];
        $adress->id_city = $data["id_city"];
        $adress->save();
        $student->id_adress = $adress->id_adress;

        //bac
        $bac = new Bac();
        $bac->year = $data["bac_year"];
        $bac->average = $data["average"];
        $bac->school = $data["school"];
        $bac->save();
        $student->id_bac = $bac->id_bac;

        $student->id_doctaurat = 0;
        $student->id_fonction = 0;

        $student->save();
        return $student->with(['adress', 'bac']);
    }
}