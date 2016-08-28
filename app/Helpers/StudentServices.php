<?php

namespace App\Helpers;

use App\Models\Adress;
use App\Models\Bac;
use App\Models\City;
use App\Models\Country;
use App\Models\Doctaurat;
use App\Models\Fonction;
use App\Models\Level;
use App\Models\Mention;
use App\Models\Result;
use App\Models\Student;
use App\Models\Study;
use App\Models\Type;
use App\Models\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class StudentServices
{

    public function init()
    {
        $init_data = array(
            "cities" => City::all()->groupBy('id_country'),
            "countries" => Country::all(),
            "levels" => Level::all(),
            "mentions" => Mention::all(),
            "results" => Result::all(),
            "bactypes" => Type::all(),
            "universities" => University::all()
        );
        return json_encode($init_data);
    }

    public function getAllStudents()
    {
        return Student::with(['adress', 'adress.city', 'adress.city.country',
            'bac', 'bac.type', 'bac.mention', 'fonction', 'fonction.adress',
            'studies', 'studies.level', 'studies.result', 'studies.university',
            'doctaurat', 'doctaurat.mention', 'doctaurat.university'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->all();
        $student = Student::whereEmail($data["email"])->first();
        if ($student != null) {
            return 1;
        }
        //try {

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
        $student->email = $data["email"];
        $student->study_access_year = $data["study_access_year"];
        $student->oriented = $data["oriented"];
        $student->origin_university = $data["origin_university"];
        $student->id_city = $data["birthday_city"];
        $student->confirmation_code = str_random(50);
        $password = str_random(8);
        $student->password = bcrypt($password);
        $student->save();

        //adress
        $adress = new Adress();
        $adress->postal_code = $data["postal_code"];
        $adress->ligne1 = $data["label_address"];
        $adress->id_city = $data["address_city"];
        $adress->id_student = $student->id_student;
        $adress->save();

        //bac
        $bac = new Bac();
        $bac->year = $data["bac_year"];
        $bac->average = $data["bac_average"];
        $bac->school = $data["bac_school"];
        $bac->id_student = $student->id_student;
        $bac->id_type = $data['bac_type'];
        $bac->id_mention = $data['bac_mention'];
        $bac->save();

        if ($request->has(['studies'])) {
            foreach ($data["studies"] as $tmp) {
                $study = new Study();
                $study->year = $tmp['study_year'];
                $study->id_student = $student->id_student;
                $study->id_university = $tmp['study_university'];
                $study->id_level = $tmp['study_level'];
                $study->id_result = $tmp['study_result'];
                $study->save();
            }
        }
        //doctaurat
        if ($request->has(['doctaurat_numero'])) {
            $doctaurat = new Doctaurat();
            $doctaurat->numero = $data['doctaurat_numero'];
            $doctaurat->date_of_pitch = $data['doctaurat_date_of_pitch'];
            $doctaurat->id_university = $data['doctaurat_id_university'];
            $doctaurat->id_mention = $data['doctaurat_id_mention'];
            $doctaurat->id_student = $student->id_student;
            $doctaurat->save();
        }

        //focntion
        if ($request->has(['nature'])) {
            $fonction = new Fonction();
            $fonction->id_student = $student->id_student;
            $fonction->nature = $data['nature'];
            $fonction->employer = $data['employer'];
            $fonction->date_of_inauguration = $data['date_of_inauguration'];
            $fonction->save();

            //fonction's adress
            $adress = new Adress();
            $adress->postal_code = $data["fonction_postal_code"];
            $adress->ligne1 = $data["fonction_label_adress"];
            $adress->id_city = $data["fonction_id_city"];
            $adress->id_fonction = $fonction->id_fonction;
            $adress->save();
        }

        //mail sending

        $link = $request->root() . "/api/student/" . $student->id_student . '/validate/' . $student->confirmation_code;
        Mail::send('validationEmail', ['nom' => $student->last_name,
            'password' => $password,
            'link' => $link], function ($message) use ($student) {
            $message->to($student->email)->subject('Validation de compte');
        });

        return $this->getStudentById($student->id_student);/*
               } catch (QueryException $e) {
                   Log::info($e->getTraceAsString());
                   return null;
               }*/
    }

    public function getStudentById($student_id)
    {
        return Student::with(['adress', 'adress.city', 'adress.city.country',
            'bac', 'bac.type', 'bac.mention', 'fonction', 'fonction.adress',
            'studies', 'studies.level', 'studies.result', 'studies.university', 'doctaurat', 'doctaurat.mention', 'doctaurat.university'])->find($student_id);
    }
}