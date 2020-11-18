<div class="fixed inset-0 z-10 overflow-y-auto" x-show="modalOpen">
	<div class="flex items-end justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
		<div class="fixed inset-0 transition-opacity">
			<div class="absolute inset-0 bg-black opacity-20" @anim('tailwindui.modal.overlay')></div>
		</div>
		<span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>&#8203;
		<div
			class="inline-block px-6 py-8 overflow-hidden text-left align-bottom transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:align-middle sm:max-w-md sm:w-full"
			x-show="modalOpen" @anim('tailwindui.modal.panel') x-ref="modalContent"></div>	
	</div>
</div>
