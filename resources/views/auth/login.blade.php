<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-flash />
            
            <form method="post" action="{{ route('login') }}">
                @csrf
                @method('post')
    
                <div class="flex flex-wrap mb-6">
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
    
                <div class="block mt-4">
                    <label for="remember_me" class="flex items-center">
                        <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div>
    
                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    
                    <x-forms.button type="submit" text="{{ __('Sign in') }}" buttonClasses="ml-4 text-lg" />
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
