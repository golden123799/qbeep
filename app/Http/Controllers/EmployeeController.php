<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$employees = Employee::with('company')->get();
		return view('employees.index', compact('employees'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		$companies = Company::all();
		return view('employees.create', compact('companies'));
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'first_name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			'company_id' => 'required|exists:companies,id',
			'email' => 'nullable|email',
			'phone' => 'nullable|string',
		]);

		Employee::create($request->all());

		return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Employee $employee)
	{
		$companies = Company::all();
		return view('employees.edit', compact('employee', 'companies'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Employee $employee)
	{
		$request->validate([
			'first_name' => 'required|string|max:255',
			'last_name' => 'required|string|max:255',
			'company_id' => 'required|exists:companies,id',
			'email' => 'nullable|email',
			'phone' => 'nullable|string',
		]);

		$employee->update($request->all());

		return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Employee $employee)
	{
		$employee->delete();

		return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
	}
}
