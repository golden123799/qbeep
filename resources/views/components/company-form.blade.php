@props([
'route' => '',
'method' => 'POST',
'company' => null,
])

<form action="{{ $route }}" method="POST" enctype="multipart/form-data">
	@csrf
	@if($method === 'PUT' || $method === 'PATCH')
	@method($method)
	@endif

	<div class="grid gap-6 mb-6 md:grid-cols-2">
		<div>
			<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
			<input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Name" value="{{ old('name', $company->name ?? '') }}" />
			@error('name')
			<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
			@enderror
		</div>
		<div>
			<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
			<input type="text" id="email" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="example@example.com" value="{{ old('email', $company->email ?? '') }}" />
			@error('email')
			<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
			@enderror
		</div>

		<div>
			<label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white" for="logo">Logo</label>
			<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" id="logo" name="logo" type="file">
			@error('logo')
			<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
			@enderror
		</div>

		<div>
			<label for="website" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Website</label>
			<input id="website" name="website" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="https://example.com" value="{{ old('website', $company->website ?? '') }}" />
			@error('website')
			<div class="text-red-600 text-sm mt-1">{{ $message }}</div>
			@enderror
		</div>
	</div>

	<button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

	<a href="{{ route('companies.index') }}" class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-gray-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-gray-600 dark:hover:bg-gray-700 dark:focus:ring-gray-800">
		Back
	</a>
</form>