<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
	/**
	 * Display a listing of the resource.
	 */
	public function index()
	{
		$companies = Company::orderBy('id', 'asc')->paginate(10);
		return view('companies.index', compact('companies'));
	}

	/**
	 * Show the form for creating a new resource.
	 */
	public function create()
	{
		return view('companies.create');
	}

	/**
	 * Store a newly created resource in storage.
	 */
	public function store(Request $request)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'nullable|email',
			'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
			'website' => 'nullable|url',
		]);

		$logoPath = null;
		if ($request->hasFile('logo')) {
			$logoPath = $request->file('logo')->store('logos', 'public');
		}

		Company::create([
			'name' => $request->name,
			'email' => $request->email,
			'logo' => $logoPath,
			'website' => $request->website,
		]);

		return redirect()->route('companies.index')->with('success', 'Company created successfully.');
	}

	/**
	 * Display the specified resource.
	 */
	public function show(Company $company)
	{
		return view('companies.show', compact('company'));
	}

	/**
	 * Show the form for editing the specified resource.
	 */
	public function edit(Company $company)
	{
		return view('companies.edit', compact('company'));
	}

	/**
	 * Update the specified resource in storage.
	 */
	public function update(Request $request, Company $company)
	{
		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'nullable|email',
			'logo' => 'nullable|image|dimensions:min_width=100,min_height=100',
			'website' => 'nullable|url',
		]);

		if ($request->hasFile('logo')) {
			// Delete the old logo if exists
			if ($company->logo) {
				Storage::disk('public')->delete($company->logo);
			}

			$company->logo = $request->file('logo')->store('logos', 'public');
		}

		$company->update([
			'name' => $request->name,
			'email' => $request->email,
			'logo' => $company->logo,
			'website' => $request->website,
		]);

		return redirect()->route('companies.index')->with('success', 'Company updated successfully.');
	}

	/**
	 * Remove the specified resource from storage.
	 */
	public function destroy(Company $company)
	{
		// Delete the logo if exists
		if ($company->logo) {
			Storage::disk('public')->delete($company->logo);
		}

		$company->delete();

		return redirect()->route('companies.index')->with('success', 'Company deleted successfully.');
	}
}
