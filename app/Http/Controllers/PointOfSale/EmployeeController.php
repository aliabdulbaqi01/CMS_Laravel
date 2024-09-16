<?php

namespace App\Http\Controllers\PointOfSale;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::latest()->paginate(10);
        return view('point.pages.employee.index', compact("employees"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('point.pages.employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return view('point.pages.employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee)
    {
        return view('point.pages.employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        if(File::exists(public_path($employee->image))) {
            File::delete(public_path($employee->image));
        }
        $employee->delete();
        toastr()->success('Employee has been deleted!');
        return redirect()->route('point.employee.index');
    }
}
