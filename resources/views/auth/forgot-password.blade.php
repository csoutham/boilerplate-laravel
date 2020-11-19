<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-flash />

            <div class="mb-4 text-base text-gray-600">
                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </div>
    
            <form method="post" action="{{ route('password.email') }}">
                @csrf
                @method('POST')
                
                <div class="flex flex-wrap mb-4">
                    @include('components.forms.input', [
					   'type' => 'email',
					   'label' => 'Email address',
					   'name' => 'email',
					   'placeholder' => __('Email address'),
					   'value' => old('email'),
					   'required' => true,
					   'autofocus' => true,
					   'errors' => $errors,
					])
                </div>
    
                <div class="flex items-center justify-end">
                    <x-forms.button type="submit" text="{{ __('Email password reset link') }}" />
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
