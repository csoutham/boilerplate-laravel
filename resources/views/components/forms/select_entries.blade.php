@isset($label)
	<label for="{{ $name }}_label" class="inline-block mb-1 text-sm font-medium text-gray-800">
		{{ $label }}
		@if (isset($noHelpIcon) && $noHelpIcon === true)
		@else
			<span id="{{ $name }}_help" class="fas fa-question-circle text-xs text-gray-300 self-center ml-1 cursor-pointer"></span>
		@endif
	</label>
@endisset

<select id="{{ $name }}"
        name="{{ $name }}"
        @isset($required) required @endisset
        class="form-select w-full block text-sm rounded bg-gray-200 border-gray-200 focus:outline-none focus:bg-white focus:border-blue-600
        @isset($inputClasses){{ $inputClasses }}@endisset
		@if ($errors->has($name)) border-red-600 @endif"
		@isset($params)
			@foreach ($params as $paramKey => $paramValue)
				{{ $paramKey }}="{{ $paramValue }}"
			@endforeach
		@endisset >
		
		@isset($nullValue)
			<option value="0"
			        @if ($value == null)
			        selected
				@endif>{{ $nullValue }}</option>
		@endisset

		@if ($entries['pages'])
			<optgroup label="Pages">
				@foreach ($entries['pages'] as $entry)
					<option value="{{ $entry['id'] }}" readonly>{{ $entry['title'] }} [{{ $entry['url'] }}]</option>
				@endforeach
			</optgroup>
		@endif
		
		@if ($entries['posts'])
			<optgroup label="Posts">
				@foreach ($entries['posts'] as $entry)
					<option value="{{ $entry['id'] }}" readonly>{{ $entry['title'] }} [{{ $entry['url'] }}]</option>
				@endforeach
			</optgroup>
		@endif
		
		@if ($entries['custom'])
			<optgroup label="Custom Post Types">
				@foreach ($entries['custom'] as $entry)
					<option value="{{ $entry['id'] }}" readonly>{{ ucfirst($entry['type']) }} - {{ $entry['title'] }} [{{ $entry['url'] }}]</option>
				@endforeach
			</optgroup>
		@endif
</select>
		
@isset($notes)
	<p class="block mt-2 text-sm font-normal text-gray-600">{!! $notes !!}</p>
@endisset

@if ($errors->has($name))
	<p class="mt-2 text-sm font-semibold text-red-600">{{ $errors->first($name) }}</p>
@endif
