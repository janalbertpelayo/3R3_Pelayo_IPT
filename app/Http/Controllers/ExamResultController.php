<?php

namespace App\Http\Controllers;

use App\Models\ExamResult;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examResults = ExamResult::all();
        return view('examResults.index', compact('examResults'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('examResults.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'student_name' => 'required',
            'score' => 'required|numeric',
        ]);

        ExamResult::create($request->all());

        return redirect()->route('examResults.index')
                         ->with('success', 'Exam result created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamResult $examResult)
    {
        return view('examResults.show', compact('examResult'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamResult $examResult)
    {
        return view('examResults.edit', compact('examResult'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamResult $examResult)
    {
        $request->validate([
            'student_name' => 'required',
            'score' => 'required|numeric',
        ]);

        $examResult->update($request->all());

        return redirect()->route('examResults.index')
                         ->with('success', 'Exam result updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamResult $examResult)
    {
        $examResult->delete();

        return redirect()->route('examResults.index')
                         ->with('success', 'Exam result deleted successfully.');
    }
}
