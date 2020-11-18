@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation">
        <ul class="flex flex-row justify-center text-sm">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="flex px-3 py-2 text-sm font-semibold text-gray-500 border border-gray-300 rounded-l" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="self-center" aria-hidden="true">
                        <x-heroicon-o-arrow-left class="w-4 h-4 text-gray-400" />
                    </span>
                </li>
            @else
                <li class="flex px-3 py-2 text-sm font-semibold text-gray-700 bg-gray-100 border border-r-0 border-gray-300 rounded-l hover:text-gray-800 hover:bg-gray-50 focus:outline-none focus:shadow-outline">
                    <a href="#"
                       wire:click.prevent="previousPage"
                       rel="prev"
                       class="self-center"
                       aria-label="@lang('pagination.previous')">
                        <x-heroicon-o-arrow-left class="w-4 h-4 text-gray-600" />
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="flex flex-1 px-3 py-2 text-gray-500 border border-r-0 border-gray-300" aria-disabled="true">
                        <span>{{ $element }}</span>
                    </li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="flex justify-center w-8 py-2 text-sm font-semibold text-center text-white bg-blue-600 border border-r-0 border-blue-600" aria-current="page">
                                <span class="self-center">{{ $page }}</span>
                            </li>
                        @else
                            <li class="flex justify-center w-8 py-2 text-sm font-semibold text-center text-gray-700 bg-gray-100 border border-r-0 border-gray-300 hover:text-gray-800 hover:bg-gray-50 focus:outline-none focus:shadow-outline">
                                <a href="#"
                                   wire:click.prevent="gotoPage({{ $page }})"
                                   class="self-center"
                                   aria-label="@lang('pagination.goto_page', ['page' => $page])">{{ $page }}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="flex px-3 py-2 bg-gray-100 border border-gray-300 rounded-r hover:text-gray-800 hover:bg-gray-50 focus:outline-none focus:shadow-outline">
                    <a href="#"
                       wire:click.prevent="nextPage"
                       rel="next"
                       class="self-center"
                       aria-label="@lang('pagination.next')">
                        <x-heroicon-o-arrow-right class="w-4 h-4 text-gray-600" />
                    </a>
                </li>
            @else
                <li class="flex px-3 py-2 border border-gray-300 rounded-r" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="self-center" aria-hidden="true">
                        <x-heroicon-o-arrow-right class="w-4 h-4 text-gray-400" />
                    </span>
                </li>
            @endif
        </ul>
    </nav>
@endif
