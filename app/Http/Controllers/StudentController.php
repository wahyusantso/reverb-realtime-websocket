<?php

namespace App\Http\Controllers;

use App\Events\StudentDataEvent;
use App\Models\Student;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class StudentController extends Controller
{

    public function index()
    {
        return view('studentform');
    }

    public function destroy(Request $request)
    {
        $user = Student::where('nim', $request->nim)
            ->where('name', $request->name)
            ->first();

        $user->delete();
        event(new StudentDataEvent($user->name));

        return back();
    }

    public function fetchData()
    {
        $studentData = Student::all();

        return DataTables::of($studentData)
            ->make(true);
    }
}
