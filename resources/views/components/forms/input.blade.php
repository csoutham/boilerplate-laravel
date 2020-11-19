@isset($label)
    <label for="{{ $name }}_label" class="inline-block mb-1 text-sm font-medium text-gray-800">
        {{ $label }}
	    @if (isset($noHelpIcon) && $noHelpIcon === true)
	    @else
		    <span id="{{ $name }}_help" class="fas fa-question-circle text-xs text-gray-300 self-center ml-1 cursor-pointer"></span>
	    @endif
    </label>
@endisset

<div class="w-full relative">
    <input id="{{ $name }}"
           type="{{ $type }}"
           name="{{ $name }}"
           autocomplete="{{ $name }}"
           class="form-input w-full block text-sm lg:text-base rounded bg-gray-100 border-gray-200 focus:outline-none focus:bg-white focus:border-blue-600
            @isset($inputClasses){{ $inputClasses }}@endisset
			@if ($errors->has($name)) border-red-600 @endif"
           @isset($value) value="{{ $value }}" @endisset
           @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
           @isset($required) required @endisset
           @isset($autofocus) autofocus @endisset
           @isset($readonly) readonly disabled @endisset
    @isset($params)
       @foreach ($params as $paramKey => $paramValue)
           {{ $paramKey }}="{{ $paramValue }}"
        @endforeach
    @endisset />
	@isset($trailing)
		<div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
			<span class="text-gray-500 sm:text-sm sm:leading-5">
				{{ $trailing }}
			</span>
		</div>
	@endisset
</div>

@isset($notes)
    <p class="block mt-2 text-sm font-normal text-gray-600">{!! $notes !!}</p>
@endisset

@if ($errors->has($name))
    <p class="mt-2 text-sm font-semibold text-red-600">{{ $errors->first($name) }}</p>
@endif
