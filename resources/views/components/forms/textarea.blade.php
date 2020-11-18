@isset($label)
    <label for="{{ $name }}_label" class="inline-block mb-1 text-sm font-medium text-gray-800">
        {{ $label }}
        @if (isset($noHelpIcon) && $noHelpIcon === true)
        @else
            <span id="{{ $name }}_help" class="fas fa-question-circle text-xs text-gray-300 self-center ml-1 cursor-pointer"></span>
        @endif
    </label>
@endisset

<textarea id="{{ $name }}"
          class="form-textarea w-full block text-sm lg:text-base rounded bg-gray-200 border-gray-200 focus:outline-none focus:bg-white focus:border-blue-600
            @isset($inputClasses){{ $inputClasses }}@endisset
          @if ($errors->has($name)) border-red-600 @endif"
          name="{{ $name }}"
          @isset($placeholder) placeholder="{{ $placeholder }}" @endisset
          rows="{{ isset($rows) ? $rows : 4 }}"
@isset($params)
    @foreach ($params as $paramKey => $paramValue)
        {{ $paramKey }}="{{ $paramValue }}"
    @endforeach
@endisset>{{ isset($value) ? $value : '' }}</textarea>

@isset($notes)
    <p class="block mt-2 text-sm font-normal text-gray-600">{!! $notes !!}</p>
@endisset

@if ($errors->has($name))
    <p class="mt-2 text-sm font-semibold text-red-600">{{ $errors->first($name) }}</p>
@endif
