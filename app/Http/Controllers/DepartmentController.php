<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::orderBy('nama', 'ASC')->get();

        return view('pages.back.department.index', ['departments' => $departments]);
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        //save
        Department::create([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        //redirect to index
        return redirect()->route('department.index')->with(['success' => 'Department Data has been saved!']);
    }

    public function show(string $id)
    {
        $department = Department::findOrFail($id);

        return view('pages.back.department.show', compact('department'));
    }

    public function edit(string $id)
    {
        $department = Department::findOrFail($id);

        return view('pages.back.department.edit', compact('department'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'deskripsi' => 'required',
        ]);

        $department = Department::findOrFail($id);

        $department->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('department.index')->with(['success' => 'Department Data has been updated!']);
    }

    public function destroy(string $id)
    {
        //get challenge by ID
        $department = Department::findOrFail($id);

        //delete department
        $department->delete();

        //redirect to index
        return redirect()->route('department.index')->with(['success' => 'Department Data has been deleted!']);
    }
}
