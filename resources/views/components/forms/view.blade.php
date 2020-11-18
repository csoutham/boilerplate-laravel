@isset($label)
    <label for="{{ $name }}" class="inline-block mb-2 text-sm font-semibold text-gray-800">
        {{ $label }}
        @if (isset($noHelpIcon) && $noHelpIcon === true)
        @else
            <span id="{{ $name }}_help" class="fas fa-question-circle text-xs text-gray-300 self-center ml-1 cursor-pointer"></span>
        @endif
    </label>
@endisset

<p id="{{ $name }}" class="block w-full px-4 py-2 bg-gray-100"
@isset($params)
    @foreach ($params as $paramKey => $paramValue)
        {{ $paramKey }}="{{ $paramValue }}"
    @endforeach
@endisset
>{{ $value }}</p>
