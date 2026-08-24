<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function profile()
    {
        return view('admin.profile');
    }

    public function departments()
    {
        $departments = Department::orderBy('id', 'DESC')->get();
        return view('admin.departments', compact('departments'));
    }

    public function createDepartment()
    {
        return view('admin.create-department');
    }

    public function storeDepartment(Request $request)
    {
        $request->validate([
            'code' => 'required|string|filled|max:10|unique:departments,code',
            'name' => 'required|string|filled|max:255',
        ]);

        Department::create($request->only('code', 'name'));

        return redirect()->route('admin.departments')->with('success', 'Department created successfully.');
    }

    public function editDepartment($id)
    {
        $department = Department::findOrFail($id);
        return view('admin.edit-department', compact('department'));
    }

    public function updateDepartment(Request $request, $id)
    {
        $department = Department::findOrFail($id);

        $request->validate([
            'code' => 'required|string|filled|max:10|unique:departments,code,' . $department->id,
            'name' => 'required|string|filled|max:255',
        ]);

        $department->update($request->only('code', 'name'));

        return redirect()->route('admin.departments')->with('success', 'Department updated successfully.');
    }

    public function destroyDepartment($id)
    {
        $department = Department::findOrFail($id);
        $department->delete();

        return redirect()->route('admin.departments')->with('success', 'Department deleted successfully.');
    }
}
