<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $grades = Grade::all();
        return response()->json($grades);
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
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'score' => 'required|numeric|min:0|max:100',
        ]);

        $grade = Grade::create($validatedData);

        return response()->json($grade, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Grade $grade)
    {
        return response()->json($grade);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Grade $grade)
    {
        // This method is typically used to return a view for editing the resource.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Grade $grade)
    {
        $validatedData = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'score' => 'sometimes|required|numeric|min:0|max:100',
        ]);

        $grade->update($validatedData);

        return response()->json($grade);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Grade $grade)
    {
        $grade->delete();

        return response()->json(null, 204);
    }
}
