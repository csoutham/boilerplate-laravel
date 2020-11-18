@if (session('success'))
	<x-modals.success />
@endif

@if (session('error'))
	<x-modals.error />
@endif

@if (session('cancelled'))
	<x-modals.cancelled />
@endif

@if (session('status'))
	<x-modals.status />
@endif

@if (count($errors) > 0)
	<div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-6" role="alert">
		<p class="font-semibold">{{ __('Errors') }}</p>
		<p class="text-sm">Please correct any mistakes below and save again.</p>
	</div>
@endif
