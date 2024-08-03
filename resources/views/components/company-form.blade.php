@props([
'route' => '',
'method' => 'POST',
'employee' => null,
'companies' => []
])

<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
	@csrf
	@if($method === 'PUT' || $method === 'PATCH')
	@method($method)
	@endif

	<div class="grid gap-6 mb-6 md:grid-cols-2">
		<div>
			<label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">First Name</label>
			<input type="text" id="first_name" name="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="First name" value="{{$employee->first_name ?? ''}}" />
			@error('first_name')
			<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Last Name</label>
			<input type="text" id="last_name" name="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Last name" value="{{$employee->last_name ?? ''}}" />
			@error('last_name')
			<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
			@enderror
		</div>

		<div>
			<label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Company</label>
			<select id="company" name="company_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
				<option selected value="">Choose a company</option>
				@foreach($companies as $company)
				<option value="{{$company->id ?? null}}" {{ $company->id == old('company_id', $employee->company_id ?? null) ? 'selected' : '' }}>{{$company->name}}</option>
				@endforeach
			</select>
			@error('company_id')
			<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
			@enderror
		</div>

		<div>
			<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
			<input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@example.com" value="{{$employee->email ?? ''}}" />
		</div>

		<div>
			<label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Phone</label>
			<input type="tel" id="phone" name="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="0123456789" value="{{$employee->phone ?? ''}}" />
		</div>
	</div>

	<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

	<a href="{{ route('employees.index') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
		Back
	</a>
</form>