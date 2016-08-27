<?php

namespace App\Helpers;

use App\Models\Adress;
use App\Models\Bac;
use App\Models\Fonction;
use App\Models\Student;
use App\Models\Study;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentServices
{

    public function getAllStudents()
    {
        return Student::with(['adress', 'adress.city', 'adress.city.country',
            'bac', 'bac.type', 'bac.mention', 'fonction', 'fonction.adress',
            'studies', 'studies.level', 'studies.result', 'studies.university'])->get();
    }

    public function getStudentById($student_id)
    {
        return Student::with(['adress', 'adress.city', 'adress.city.country',
            'bac', 'bac.type', 'bac.mention', 'fonction', 'fonction.adress',
            'studies', 'studies.level', 'studies.result', 'studies.university'])->find($student_id);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->all();
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
            $student->id_city = $data["birthday_city"];
            $student->save();

            //adress
            $adress = new Adress();
            $adress->postal_code = $data["postal_code"];
            $adress->ligne1 = $data["label_adress"];
            $adress->id_city = $data["adress_city"];
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
                    $study->id_result = $tmp['study_resultat'];
                    $study->save();
                }
            }
            //doctaurat
            if ($request->has(['doctaurat'])) {

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
            /*
            $link = "";
            Mail::send('validationEmail', ['nom' => $student->first_name,
                'prenom' => $student->last_name, 'CIN' => $student->cin,
                'link' => $link], function ($message) use ($student) {
                $message->to($student->mail)->subject('Validation de compte');
            });
            */
            return $this->getStudentById($student->id_student);
        } catch (QueryException $e) {
            Log::info($e->getTraceAsString());
            return null;
        }
    }
}