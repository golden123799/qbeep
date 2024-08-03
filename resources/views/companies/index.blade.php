<x-app-layout>
	<x-slot name="header">
		<h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
			{{ __('Companies') }}
		</h2>
	</x-slot>

	<div class="py-12">
		<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

			<div class="flex justify-between items-center mb-4">
				<a href="{{ route('companies.create') }}" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
					Create New Company
				</a>
			</div>

			<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
				<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
						<tr>
							<th scope="col" class="px-6 py-3">
								ID
							</th>
							<th scope="col" class="px-6 py-3">
								Name
							</th>
							<th scope="col" class="px-6 py-3">
								Email
							</th>
							<th scope="col" class="px-6 py-3">
								Logo
							</th>
							<th scope="col" class="px-6 py-3">
								Website
							</th>
							<th scope="col" class="px-6 py-3">
								Actions
							</th>
						</tr>
					</thead>
					<tbody>
						@foreach($companies as $company)
						<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
							<th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
								{{$company->id}}
							</th>
							<td class="px-6 py-4">
								{{$company->name}}
							</td>
							<td class="px-6 py-4">
								{{$company->email}}
							</td>
							<td class="px-6 py-4">
								{{$company->logo}}
							</td>
							<td class="px-6 py-4">
								{{$company->website}}
							</td>
							<td class="px-6 py-4 text-right">
								<a href="{{ route('companies.edit', $company->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>

								<form action="{{ route('companies.destroy', $company->id) }}" method="POST" class="inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="font-medium text-red-600 dark:text-red-500 hover:underline ml-4" onclick="return confirm('Are you sure you want to delete this company?')">Delete</button>
								</form>
							</td>
						</tr>
						@endforeach

					</tbody>
				</table>
			</div>
			<div>
				{{$companies}}
			</div>

		</div>
	</div>

</x-app-layout>