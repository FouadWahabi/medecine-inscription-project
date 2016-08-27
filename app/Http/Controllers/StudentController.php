<?php

namespace App\Http\Controllers;

use App\Helpers\StudentServices;
use App\Helpers\Utils;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentServices;
    protected $utils;

    function __construct(StudentServices $studentServices, Utils $utils)
    {
        $this->studentServices = $studentServices;
        $this->utils = $utils;
    }

    function getStudent($student_id = null)
    {
        if ($student_id == null) {
            return response()->json(['response' => $this->studentServices->getAllStudents()], 200);
        }
        $student = $this->studentServices->getStudentById($student_id);
        if ($student == null) {
            response()->json(['response' => 'student not found'], 404);
        }
        return response()->json(['response' => $student], 200);
    }

    function add(Request $request)
    {
        if (!$request->has([
            'last_name', 'first_name', 'second_name', 'sex', 'birthday', 'birthday_city', 'cin', 'passport',
            'phone', 'mobile', 'mail', 'study_access_year', 'oriented', 'postal_code', 'label_adress',
            'adress_city', 'bac_year', 'bac_average', 'bac_school', 'bac_mention', 'bac_type'])
        ) {
            return response()->json(['response' => 'invalid inputs'], 400);
        }
        $student = $this->studentServices->store($request);
        if ($student == null) {
            return response()->json(['response' => 'invalid inputs'], 400);
        }
        return response()->json(['response' => $student], 200);
    }

    function validateStudentCompte($student_id = null, $token = null)
    {
        $student = $this->studentServices->getStudentById($student_id);
        if ($student == null) {
            response()->json(['response' => 'student not found'], 404);
        }
        if ($token == $student->confirmation_code) {
            $student->valid = true;
            $student->save();
        }
        return response()->json(['response' => 'student account validation success'], 200);

    }

    function uploadPhoto($student_id = null, Request $request)
    {
        $student = $this->studentServices->getStudentById($student_id);
        if ($student == null) {
            response()->json(['response' => 'student not found'], 404);
        }
        if (!$request->has(['img'])) {
            return response()->json(['response' => 'invalid inputs'], 400);
        }
        $data = $request->all()['img'];
        $chemin = 'uploads';
        do {
            $nom = str_random(10) . '.png';
        } while (file_exists($chemin . '/' . $nom));

        $this->utils->base64_to_jpeg($data, $chemin . '/' . $nom);

        $student->img = $request->root() . '/' . $chemin . '/' . $nom;

        $student->save();
        return response()->json(['response' => $student->img], 200);
    }
}



