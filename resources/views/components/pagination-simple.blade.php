@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex flex-row justify-center text-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li aria-label="@lang('pagination.previous')" class="self-center w-8 text-center">
                    <x-heroicon-o-arrow-left class="w-4 h-4 text-gray-400" />
                </li>
            @else
                <li class="self-center w-8 text-center">
                    <a href="#"
                       wire:click.prevent="previousPage"
                       rel="prev"
                       class="self-center"
                       aria-label="@lang('pagination.previous')">
                        <x-heroicon-o-arrow-left class="w-4 h-4 text-gray-600" />
                    </a>
                </li>
            @endif

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="self-center w-8 text-center">
                    <a href="#"
                       wire:click.prevent="nextPage"
                       rel="next"
                       class="self-center"
                       aria-label="@lang('pagination.next')">
                        <x-heroicon-o-arrow-right class="w-4 h-4 text-gray-600" />
                    </a>
                </li>
            @else
                <li aria-disabled="true" aria-label="@lang('pagination.next')" class="self-center w-8 text-center">
                    <x-heroicon-o-arrow-right class="w-4 h-4 text-gray-400" />
                </li>
            @endif
        </ul>
    </nav>
@endif
