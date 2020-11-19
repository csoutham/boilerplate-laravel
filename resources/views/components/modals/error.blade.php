@if (session('error'))
	<div x-data="{ alertOpen: true }">
		<div class="fixed inset-0 z-10 overflow-y-auto" x-show="alertOpen">
			<div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
				<div class="fixed inset-0 transition-opacity">
					<div class="absolute inset-0 bg-black opacity-20" @anim('tailwindui.modal.overlay')></div>
				</div>
				<span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
				<div
					class="inline-block px-6 py-8 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-md sm:w-full"
					x-show="alertOpen" @anim('tailwindui.modal.panel')>
					<div>
						<div class="flex items-center justify-center w-16 h-16 mx-auto bg-red-100 rounded-full">
							<x-heroicon-o-x class="w-6 h-6 text-red-600" />
						</div>
						<div class="mt-6 mb-8 text-center">
							<h3 class="text-3xl font-bold leading-normal text-gray-800">{{ session('error') }}</h3>
						</div>
					</div>
					<div class="mt-5 sm:mt-6">
				        <span class="flex justify-center w-full">
							<button type="button" class="button button-primary"
							      x-on:click="alertOpen = !alertOpen">
								{{ __('Close') }}
							</button>
				        </span>
					</div>
				</div>
			</div>
		</div>
	</div>
@endif
