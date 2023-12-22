<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Models\Department;
use App\Models\Employee;
use App\Models\User;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::all();
        $departments = Department::all();

        return view('pages.back.employee.index',
        [
            'employees' => $employees,
            'departments' => $departments,
        ]);
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'email' => 'nullable|unique:users,email',
            'password' => 'nullable',
            'nip' => 'required|numeric|unique:employees,nip',
            'nama' => 'required',
            'department' => 'required',
            'telp' => 'required',
            'alamat' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:1024',
        ]);

        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'nama' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
        ]);

        $employee = Employee::create([
            'nip' => $request->nip,
            'department_id' => $request->department,
        ]);

        if($request->hasFile('image')) {
            $idEmployee = $employee->id;

            $fileName = 'employee'.$idEmployee.'.'.$request->image->extension();
            $destinationPath = 'assets/images/employees/';

            DB::table('employees')
            ->where('id', $idEmployee)
            ->update(['image' => $fileName]);

            $request->image->move(public_path($destinationPath), $fileName);
            return redirect()->route('employee.index')->with(['success' => 'Image Detail uploaded successfully!']);

        } else {
            return redirect()->route('employee.index')->with(['error' => 'Image Detail failed to upload!']);
        }
    }

    public function show(string $id)
    {
        $employee = Employee::findOrFail($id);

        return view('pages.back.employee.show', compact('employee'));
    }

    public function edit(string $id)
    {
        $employee = Employee::findOrFail($id);
        $departments = Department::orderBy('nama', 'ASC')->get();

        return view('pages.back.employee.edit', compact('employee', 'departments'));
    }

    public function editImage(string $id)
    {
        $employee = Employee::findOrFail($id);

        return view('pages.back.employee.editImage', compact('employee'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'department' => 'required',
            'telp' => 'required',
            'alamat' => 'required'
        ]);

        $employee = Employee::findOrFail($id);

        $employee->update([
            'nama' => $request->nama,
            'department_id' => $request->department,
            'telp' => $request->telp,
            'alamat' => $request->alamat
        ]);

        return redirect()->route('employee.index')->with(['success' => 'Employee Data has been updated!']);
    }

    public function updateImage(Request $request, string $id)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,svg,webp|max:1024',
        ]);

        $fileName = 'employee'.$id.'.'.$request->image->extension();
        $employee = Employee::findOrFail($id);

        $employee->update([
            'image' => $fileName,
        ]);

        $destinationPath = 'assets/images/employees/';
        $request->image->move(public_path($destinationPath), $fileName);

        return redirect()->route('employee.index')->with(['success' => 'Employee KTP Image has been updated!']);
    }

    public function destroy(string $id)
    {
        //get challenge by ID
        $employee = Employee::findOrFail($id);

        //delete employee
        $employee->delete();

        //redirect to index
        return redirect()->route('employee.index')->with(['success' => 'Employee Data has been deleted!']);
    }

    public function destroyImage(string $id)
    {
        $employee = Employee::findOrFail($id);

        if(\File::exists(public_path('assets/images/employees/' . $employee->image))) {
            \File::delete(public_path('assets/images/employees/' . $employee->image));

            DB::table('employees')
            ->where('id', $id)
            ->update(['image' => null]);

            return redirect()->route('employee.index')->with(['success' => 'KTP Image has been deleted!']);

        } else {
            return redirect()->route('employee.index')->with(['error' => 'KTP Image not found!']);
        }

    }
}
