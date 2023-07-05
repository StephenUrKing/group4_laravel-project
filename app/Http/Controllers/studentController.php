<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Student;
use Illuminate\Http\Request;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students  = Student::paginate(18);
        return view('student.list', ['students'=>$students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $do =route('student.store');
        return view('student.form',[
            'allstudent' => new Student,
            'do'=>$do,
        ])->with('locations',location::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $info= $request->validate([
            'name'=>"required",
            'studentId'=>"required",
            'email'=>"required",
            'gender'=>"required",
            'dob'=>"required",
            'course_id'=>"required"
        ]);

        Student::create($info);

        return redirect(route('student.index'))->with('notification', 'Student Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $allstudent = Student::findOrFail($id);
        return view('Student.view',[
            'allstudent'=>$allstudent,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $allstudent = Student::findOrFail($id);
        $do =route('student.update', [$id]);
        return view('student.form',[
            'allstudent'=>$allstudent,
            'do'=>$do,
            'edit' => true
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $info= $request->validate([
            'name'=>"required",
            'studentId'=>"required|unique:student,studentId",
            'email'=>"required|email|unique:student,email",
            'gender'=>"required",
            'dob'=>"required",
            'location_id'=>"required"
        ]);
        $allstudent = Student::findOrFail($id);
        $allstudent->update($info);
        return redirect(route('student.index'))->with('notification', 'Student Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $allstudent = Student::findOrFail($id);
        $allstudent->delete();
        return redirect(route('student.index'))->with('notification', 'Student Deleted');
    }
}
