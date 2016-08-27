<?php

namespace App\Http\Controllers;

use App\Helpers\StudentServices;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $studentServices;

    function __construct(StudentServices $studentServices)
    {
        $this->studentServices = $studentServices;
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
            'adress_city', 'bac_year', 'bac_average', 'bac_school','bac_mention','bac_type'])
        ) {
            return response()->json(['response' => 'invalid inputs'], 400);
        }
        $student = $this->studentServices->store($request);
        if ($student == null) {
            return response()->json(['response' => 'invalid inputs'], 400);
        }
        return response()->json(['response' => $student], 200);
    }
}



