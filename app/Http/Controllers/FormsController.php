<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;

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
       ->get();
       
      return view('groups', compact(['groups', 'number']));
      
    }

    public function findStudentsOnCourse(Request $request)
    {   
        $search = $request->search;
        $students = \DB::table('course_students')
        ->join('courses', 'courses.id', '=', 'course_students.course_id')
        ->join('students', 'students.id', '=', 'course_students.student_id')
        ->select('students.first_name', 'students.last_name', 'courses.name', 'students.id')
        ->where('courses.name', '=', $search)
        ->get();
        return view("StudentsOnCourse", compact(['students', 'search']));
    }

    public function addNewStudent(StoreRequest $request)
    {
        $data = $request->validated();
        Student::create($data);
        return 'Student ' . $data['first_name'] . ' '. $data['last_name'] . ' was successfully added';
    }

    public function deleteStudent(Request $request)
    {   
        $student_id = $request->student_id;
       \DB::table('students')
       ->where('students.id', '=', $student_id)
       ->delete();
        return 'Student with student_id ' . $student_id . ' was successfully deleted';
    }

    public function allStudentsCourses()
    {
        $students = Student::get();
        $studentsCourses = \DB::table('course_students')
        ->join('courses', 'courses.id', '=', 'course_students.course_id')
        ->select('courses.name', 'course_students.student_id', 'courses.id')
        ->get();
        
        $courses = Course::get();
    
        return view('StudentsAllCourses', compact(['students', 'studentsCourses', 'courses']));

    }

    public function addStudentToCourse(Request $request, $student_id)
    {
       $course = $request->course;

       foreach(Course::where('name', $course)->get() as $info)
       {
        $courseId = $info->id;
       }
       

       \DB::table("course_students")->insert([
        "student_id"=> $student_id,
        "course_id"=> $courseId,
    ]);
        
        return redirect()->route('get.all.students.courses');
    
    }

    public function deleteStudentFromCourse(Request $request, $student_id)
    {
        $course = $request->course;

        foreach(Course::where('name', $course)->get() as $info)
       {
        $courseId = $info->id;
       }

      \DB::table("course_students")
       ->where('course_students.student_id', '=', $student_id)
       ->where('course_students.course_id', '=', $courseId)
       ->delete();
       
       return redirect()->route('get.all.students.courses');
    }
}
