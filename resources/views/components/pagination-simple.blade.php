@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex justify-center text-sm gap-4">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-label="@lang('pagination.previous')" class="self-center">
                    <x-fas-chevron-left class="w-5 h-5 text-gray-600" />
                </li>
            @else
                <li class="self-center">
                    <a href="#"
                       wire:click.prevent="previousPage"
                       rel="prev"
                       class="self-center"
                       aria-label="@lang('pagination.previous')">
                        <x-fas-chevron-left class="w-5 h-5 text-gray-600" />
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="self-center">
                    <a href="#"
                       wire:click.prevent="nextPage"
                       rel="next"
                       class="self-center"
                       aria-label="@lang('pagination.next')">
                        <x-fas-chevron-right class="w-5 h-5 text-gray-600" />
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')" class="self-center">
                    <x-fas-chevron-right class="w-5 h-5 text-gray-600" />
                </li>
            @endif
        </ul>
    </nav>
@endif
