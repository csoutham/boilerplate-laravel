<x-guest-layout>
	<header class="bg-white shadow">
		<div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
			<h2 class="text-3xl text-gray-800 title">
				{{ __('Welcome') }}
			</h2>
		</div>
	</header>
	
	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">
		<div class="bg-white overflow-hidden shadow-sm sm:rounded-md h-64 px-8 py-6">
			<div class="flex flex-row justify-between">
				<a href="{{ route('login') }}" class="text-lg text-blue-600">
					{{ __('Login') }}
				</a>
				<a href="{{ route('register') }}" class="text-lg text-blue-600">
					{{ __('Register') }}
				</a>
			</div>
		</div>
	</div>
</x-guest-layout>
