<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-flash />
            
            <div class="mb-4 text-base text-gray-600">
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </div>

            <form method="post" action="{{ route('password.confirm') }}">
                @csrf
                @method('POST')
    
                <div class="flex flex-wrap mb-2">
                    @include('components.forms.input', [
					   'type' => 'password',
					   'label' => 'Password',
					   'name' => 'password',
					   'placeholder' => __('Password'),
					   'value' => old('password'),
					   'required' => true,
					   'errors' => $errors,
					])
                </div>
    
                <div class="flex justify-end mt-4">
                    <x-forms.button type="submit" text="{{ __('Confirm password') }}" buttonClasses="text-lg" />
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
