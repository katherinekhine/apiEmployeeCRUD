<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Employee::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ], [
            'required' => "You need to fill :attribute,"
        ]);
        if ($validated->fails()) {
            return response()->json($validated->messages(), 422);
        } else {
            $employee = Employee::create($request->all());
            return response()->json($employee, 201);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return response()->json($employee, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee)
    {
        $validated = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ], [
            'required' => "You need to fill :attribute,"
        ]);
        if ($validated->fails()) {
            return response()->json($validated->messages(), 422);
        } else {
            $employee->update($request->all());
            return response()->json($employee, 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(["message" => "Successfully deleted"]);
    }
}
