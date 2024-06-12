<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Student;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    public function addNewStudent(StoreRequest $request)
    {
        $data = $request->validated();
        Student::create($data);
        return 'Student ' . $data['first_name'] . ' '. $data['last_name'] . ' was successfully added';
    }
}
