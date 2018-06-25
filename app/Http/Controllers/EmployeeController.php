<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeDetail;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::all();
        // $employees = Employee::orderBy('name','desc')->get();
        // $employees = Employee::find(9);
        // $employees = Employee::where('age','<=',30)->get();
        // $employees = Employee::where('name','user')->get();

        return view('employee.index',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'numeric|max:100',
        ]);        

        $employee = new Employee();
        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->salary = $request->salary;
        $employee->hobbies = $request->hobbies;
        $employee->save();

        $detail = new EmployeeDetail();
        $detail->passport_no = $request->passport_no;
        $detail->pancard_no = $request->pancard_no;
        $employee->employeeDetail()->save($detail);

        return redirect('employee');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        $detail = $employee->employeeDetail;
        return $detail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('employee.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'age' => 'numeric|max:100',
        ]);        

        $employee->name = $request->name;
        $employee->age = $request->age;
        $employee->salary = $request->salary;
        $employee->hobbies = $request->hobbies;
        $employee->save();

        $detail = $employee->employeeDetail;
        $detail->passport_no = $request->passport_no;
        $detail->pancard_no = $request->pancard_no;
        $employee->employeeDetail()->save($detail);

        return redirect('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->employeeDetail()->delete();
        $employee->delete();
        return redirect('employee');
    }
}
