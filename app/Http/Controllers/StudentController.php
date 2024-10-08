<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::with('kelas')->get();
        return view('pages.students.index', compact('students'));
    }

    public function create()
    {
        $classes = Kelas::all();
        return view('pages.students.create', compact('classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'class_id' => ['required', 'exists:classes,id'],
            'nip' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
        ]);

        Student::create([
            'class_id' => $request->class_id,
            'nip' => $request->nip,
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        session()->flash('success', 'Student created successfully');
        return redirect()->route('students.index');
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classes = Kelas::all();

        return view('pages.students.edit', compact('student', 'classes'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'class_id' => ['required', 'exists:classes,id'],
            'nip' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:255'],
            'gender' => ['required', 'string', 'max:255'],
        ]);

        $student->update([
            'class_id' => $request->class_id,
            'nip' => $request->nip,
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
        ]);

        session()->flash('success', 'Student updated successfully');
        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();

        session()->flash('success', 'Student deleted successfully');
        return redirect()->route('students.index');
    }
}
