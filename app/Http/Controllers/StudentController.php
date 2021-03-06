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
            'last_name', 'first_name', 'sex', 'birthday', 'birthday_city',
            'mobile', 'email', 'oriented', 'postal_code', 'label_address',
            'address_city', 'bac_year', 'bac_average', 'bac_school', 'bac_mention', 'bac_type'])
        ) {
            return response()->json(['response' => 'Invalid Input'], 400);
        }
        $student = $this->studentServices->store($request);
        if ($student == null) {
            return response()->json(['response' => 'Invalid Input'], 400);
        }
        if (is_int($student)) {
            if ($student == 1) {
                return response()->json(['response' => 'Compte exist déja'], 400);
            }
        }
        return response()->json(['response' => $student], 200);
    }

    function init()
    {
        return $this->studentServices->init();
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
        return redirect()->action('AngularController@serveApp');

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
            $nom = str_random(10);
        } while (file_exists($chemin . '/' . $nom));

        $path = $chemin . '/' . $nom;

        $this->utils->base64_to_jpeg($data, $path);

        $student->img = $request->root() . '/' . $chemin . '/' . $nom;

        $student->save();
        return response()->json(['response' => $student->img], 200);
    }
}



