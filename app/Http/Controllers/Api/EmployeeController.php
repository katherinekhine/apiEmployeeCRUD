<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Database\Eloquent\ModelNotFoundException;
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
    public function show($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            return response()->json([
                'data' => $employee
            ], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Employee not found with id ' . $id
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
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
            try {
                $employee = Employee::findOrFail($id);
                $employee->update($request->all());
                return response()->json($employee, 200);
            } catch (ModelNotFoundException $e) {
                return response()->json([
                    'error' => 'Employee not found with id ' . $id
                ], 404);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $employee = Employee::findOrFail($id);
            $employee->delete();
            return response()->json(["message" => "Successfully deleted"]);
        } catch (ModelNotFoundException $e) {
            return response()->json([
                'error' => 'Employee not found with id ' . $id
            ], 404);
        }
    }
}
