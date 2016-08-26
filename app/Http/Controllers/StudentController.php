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
            'last_name', 'first_name', 'second_name', 'sex', 'birthday', 'cin', 'passport', 'phone'
            , 'mobile', 'mail', 'study_access_year', 'oriented', 'origin_university'])
        ) {
            //return response()->json(['response' => 'invalid inputs'], 400);
        }

        $student = $this->studentServices->store($request->all());
        if ($student == null) {
            return response()->json(['response' => 'invalid inputs'], 400);
        }
        return response()->json(['response' => $student], 200);
    }
}
