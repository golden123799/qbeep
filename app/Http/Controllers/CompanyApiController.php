<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Resources\CompanyResource;

class CompanyApiController extends Controller
{
	public function show($id)
	{
		// Fetch the company with its employees
		$company = Company::with('employees')->withCount('employees')->findOrFail($id);

		// Return the company with employees using a resource
		return new CompanyResource($company);
	}
}
