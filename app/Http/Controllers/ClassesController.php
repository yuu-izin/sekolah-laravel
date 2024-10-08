<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    public function index()
    {
        $classes = Kelas::all();

        return view('pages.class.index', compact('classes'));
    }

    public function create()
    {
        return view('pages.class.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'class_number' => ['required', 'string', 'max:255'],
        ]);

        Kelas::create([
            'name' => $request->name,
            'class_number' => $request->class_number,
        ]);

        session()->flash('success', 'Class created successfully');
        return redirect()->route('classes.index');
    }

    public function edit($id)
    {
        $class = Kelas::findOrFail($id);
        return view('pages.class.edit', compact('class'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'class_number' => ['required', 'string', 'max:255'],
        ]);

        $class = Kelas::findOrFail($id);
        $class->update([
            'name' => $request->name,
            'class_number' => $request->class_number,
        ]);

        session()->flash('success', 'Class updated successfully');
        return redirect()->route('classes.index');
    }

    public function destroy(Kelas $class)
    {
        $class->delete();

        session()->flash('success', 'Class deleted successfully');
        return redirect()->route('classes.index');
    }
}
