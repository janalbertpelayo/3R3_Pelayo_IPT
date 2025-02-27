<?php

namespace App\Http\Controllers;

use App\Models\ExamType;
use Illuminate\Http\Request;

class ExamTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examTypes = ExamType::all();
        return view('examtypes.index', compact('examTypes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('examtypes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ExamType::create($request->all());

        return redirect()->route('examtypes.index')
                         ->with('success', 'Exam Type created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamType $examType)
    {
        return view('examtypes.show', compact('examType'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamType $examType)
    {
        return view('examtypes.edit', compact('examType'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamType $examType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $examType->update($request->all());

        return redirect()->route('examtypes.index')
                         ->with('success', 'Exam Type updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamType $examType)
    {
        $examType->delete();

        return redirect()->route('examtypes.index')
                         ->with('success', 'Exam Type deleted successfully.');
    }
}
