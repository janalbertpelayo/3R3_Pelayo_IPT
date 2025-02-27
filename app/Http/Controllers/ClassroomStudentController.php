<?php

namespace App\Http\Controllers;

use App\Models\ClassroomStudent;
use Illuminate\Http\Request;

class ClassroomStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classroomStudents = ClassroomStudent::all();
        return response()->json($classroomStudents);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // This method is typically used to return a view for creating a new resource.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:classroom_students',
        ]);

        $classroomStudent = ClassroomStudent::create($request->all());

        return response()->json($classroomStudent, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ClassroomStudent $classroomStudent)
    {
        return response()->json($classroomStudent);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ClassroomStudent $classroomStudent)
    {
        // This method is typically used to return a view for editing the resource.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ClassroomStudent $classroomStudent)
    {
        $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|string|email|max:255|unique:classroom_students,email,' . $classroomStudent->id,
        ]);

        $classroomStudent->update($request->all());

        return response()->json($classroomStudent);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ClassroomStudent $classroomStudent)
    {
        $classroomStudent->delete();

        return response()->json(null, 204);
    }
}
