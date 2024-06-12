<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function index()
    {
        return view("forms");
    }

    public function findGroups(Request $request)
    {   
       $number = $request->number;
       $groups = \DB::table('students')
       ->join('groups', 'students.group_id', '=', 'groups.id')
       ->select(\DB::raw('COUNT(*) as count'), 'groups.name')
       ->groupBy('groups.name')
       //->having('count', '<=',  $number)
       ->get();
       //dd($groups);
      return view('groups', compact(['groups', 'number']));
      
    }

    public function findStudentsOnCourse(Request $request)
    {   
        $search = $request->search;
        $students = \DB::table('course_students')
        ->join('courses', 'courses.id', '=', 'course_students.course_id')
        ->join('students', 'students.id', '=', 'course_students.student_id')
        ->select('students.first_name', 'students.last_name', 'courses.name')
        ->where('courses.name', '=', $search)
        ->get();
        return view("StudentsOnCourse", compact(['students', 'search']));
    }

}
