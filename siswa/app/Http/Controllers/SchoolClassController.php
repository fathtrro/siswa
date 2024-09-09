<?php

namespace App\Http\Controllers;

use App\Models\SchoolClass;
use Illuminate\Http\Request;

class SchoolClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();
        return view('classes.index', compact('classes'));
    }

    public function create()
    {
        return view('classes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_name' => 'required|unique:school_classes,class_name|max:255',
        ]);

        SchoolClass::create($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Class created successfully.');
    }

    public function show(SchoolClass $class)
    {
        $siswas = $class->siswas;
        return view('classes.show', compact('class', 'siswas'));
    }

    public function edit(SchoolClass $class)
    {
        return view('classes.edit', compact('class'));
    }

    public function update(Request $request, SchoolClass $class)
    {
        $request->validate([
            'class_name' => 'required|unique:school_classes,class_name,' . $class->id . '|max:255',
        ]);

        $class->update($request->all());

        return redirect()->route('classes.index')
            ->with('success', 'Class updated successfully.');
    }

    public function destroy(SchoolClass $class)
    {
        $class->delete();

        return redirect()->route('classes.index')
            ->with('success', 'Class deleted successfully.');
    }
}
