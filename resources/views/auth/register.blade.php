<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-flash />

            <form method="post" action="{{ route('register') }}">
                @csrf
                @method('POST')
    
                <div class="flex flex-wrap mb-6">
                    @include('components.forms.input', [
					   'type' => 'text',
					   'label' => 'Name',
					   'name' => 'name',
					   'placeholder' => __('Name'),
					   'value' => old('name'),
					   'required' => true,
					   'autofocus' => true,
					   'errors' => $errors,
					])
                </div>
    
                <div class="flex flex-wrap mb-6">
                    @include('components.forms.input', [
					   'type' => 'email',
					   'label' => 'Email',
					   'name' => 'email',
					   'placeholder' => __('Email address'),
					   'value' => old('email'),
					   'required' => true,
					   'errors' => $errors,
					])
                </div>
    
                <div class="flex flex-wrap mb-6">
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
    
                <div class="flex flex-wrap mb-6">
                    @include('components.forms.input', [
					   'type' => 'password',
					   'label' => 'Confim Password',
					   'name' => 'password_confirmation',
					   'placeholder' => __('Confirm Password'),
					   'value' => old('password_confirmation'),
					   'required' => true,
					   'errors' => $errors,
					])
                </div>
            
                <div class="flex items-center justify-end mt-4">
                    <x-forms.button type="submit" text="{{ __('Sign up') }}" buttonClasses="ml-4 text-lg" />
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
