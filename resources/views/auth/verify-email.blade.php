<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <div class="w-full sm:max-w-md mt-6 px-6 py-6 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <x-flash />

            <div class="mb-4 text-base leading-normal text-gray-600">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>
    
            <div class="mt-6 flex items-center justify-between">
                <form method="post" action="{{ route('verification.send') }}">
                    @csrf
                    @method('POST')
    
                    <x-forms.button type="submit" text="{{ __('Resend verification email') }}" buttonClasses="text-lg" />
                </form>
    
                <form method="post" action="{{ route('logout') }}">
                    @csrf
                    @method('POST')
    
                    <button type="submit" class="text-sm text-gray-600 hover:text-gray-900">
                        {{ __('Logout') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
