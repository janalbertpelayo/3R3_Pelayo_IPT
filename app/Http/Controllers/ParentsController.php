<?php

namespace App\Http\Controllers;

use App\Models\Parents;
use Illuminate\Http\Request;

class ParentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $parents = Parents::all();
        return view('parents.index', compact('parents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('parents.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        Parents::create($request->all());

        return redirect()->route('parents.index')
                         ->with('success', 'Parent created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Parents $parents)
    {
        return view('parents.show', compact('parents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Parents $parents)
    {
        return view('parents.edit', compact('parents'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Parents $parents)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $parents->update($request->all());

        return redirect()->route('parents.index')
                         ->with('success', 'Parent updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Parents $parents)
    {
        $parents->delete();

        return redirect()->route('parents.index')
                         ->with('success', 'Parent deleted successfully.');
    }
}
