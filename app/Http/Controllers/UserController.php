<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('pages.back.user.index', ['users' => $users]);
    }

    public function customer()
    {
        $customers = User::where('user_type', 'customer')->get();

        return view('pages.back.customer.index', ['customers' => $customers]);
    }

    public function employee()
    {
        $employees = User::where('user_type', 'employee')->get();

        return view('pages.back.employee.index', ['employees' => $employees]);
    }

    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'nullable|unique:users,email',
            'password' => 'nullable',
            'telp' => 'required',
            'alamat' => 'required',
            'kota' => 'required',
            'kodepos' => 'required',
            'user_type' => 'nullable',
        ]);

        //save
        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'kodepos' => $request->kodepos,
            'user_type' => $request->user_type,
        ]);

        //redirect to index
        return redirect()->route('customer.index')->with(['success' => 'Customer Data has been saved!']);
    }

    public function show(string $id)
    {
        $customer = User::findOrFail($id);

        return view('pages.back.customer.show', compact('customer'));
    }

    public function edit(string $id)
    {
        $customer = User::findOrFail($id);

        return view('pages.back.customer.edit', compact('customer'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'telp' => 'required',
            'kota' => 'required',
            'alamat' => 'required',
        ]);

        $user = User::findOrFail($id);

        $user->update([
            'nama' => $request->nama,
            'telp' => $request->telp,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
        ]);

        if (Auth::user()->user_type == 'admin') {
            return redirect()->route('user.index')->with(['success' => 'Data has been updated!']);
        } else {
            return redirect()->route('customer.index')->with(['success' => 'Data has been updated!']);
        }
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('customer.index')->with(['success' => 'Data has been deleted!']);
    }
}
