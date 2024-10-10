<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    public function index()
    {
        $teachers = Teacher::with('subject')->get();
        return view('pages.teachers.index', compact('teachers'));
    }

    public function create()
    {
        $subjects = Subject::all();
        return view('pages.teachers.create', compact('subjects'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'nidn' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:10'],
        ]);

        Teacher::create($request->all());

        session()->flash('success', 'Guru berhasil ditambahkan!');
        return redirect()->route('teachers.index');
    }

    public function edit(Teacher $teacher)
    {
        $subjects = Subject::all();
        return view('pages.teachers.edit', compact('teacher', 'subjects'));
    }

    public function update(Request $request, Teacher $teacher)
    {
        $request->validate([
            'subject_id' => ['required', 'exists:subjects,id'],
            'nidn' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:15'],
            'address' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:10'],
        ]);

        $teacher->update($request->all());

        session()->flash('success', 'Guru berhasil diperbarui!');
        return redirect()->route('teachers.index');
    }

    public function destroy(Teacher $teacher)
    {
        $teacher->delete();
        session()->flash('success', 'Guru berhasil dihapus!');
        return redirect()->route('teachers.index');
    }
}
