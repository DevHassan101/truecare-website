@if ($paginator->hasPages())
   
    <div class="flex items-center gap-3">
        @if ($paginator->onFirstPage())
            <span class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full border border-gray-300 px-4">
                Prev
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}"
                class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full border border-gray-300 px-4">
                Prev
            </a>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5 dark:bg-gray-800 dark:border-gray-600">{{ $element }}</span>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="md:w-[2.3vw] md:h-[2.3vw] sm:w-[4.3vw] sm:h-[4.3vw] xs:w-[6.3vw] xs:h-[6.3vw] flex items-center justify-center transition-all duration-300 bg-theme-blue text-white rounded-full border border-gray-300">
                            {{ $page }}
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="md:w-[2.3vw] md:h-[2.3vw] sm:w-[4.3vw] sm:h-[4.3vw] xs:w-[6.3vw] xs:h-[6.3vw] flex items-center justify-center transition-all duration-300 hover:bg-theme-blue hover:text-white rounded-full border border-gray-300">
                            {{ $page }}
                        </a>
                        {{-- <a href="{{ $url }}"
                            class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150 dark:bg-gray-800 dark:border-gray-600 dark:text-gray-400 dark:hover:text-gray-300 dark:active:bg-gray-700 dark:focus:border-blue-800"
                            aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                            {{ $page }}
                        </a> --}}
                    @endif
                @endforeach
            @endif
        @endforeach
        {{-- @foreach ($elements as $element)
            <div
                class="md:w-[2.3vw] md:h-[2.3vw] sm:w-[4.3vw] sm:h-[4.3vw] xs:w-[6.3vw] xs:h-[6.3vw] flex items-center justify-center transition-all duration-300 hover:bg-theme-blue hover:text-white rounded-full border border-gray-300">
                1
            </div>
        @endforeach --}}

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}"
                class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full border border-gray-300 px-4">
                Next
            </a>
        @else
            <span class="md:py-[0.3vw] sm:py-[0.8vw] xs:py-[1.3vw] rounded-full border border-gray-300 px-4">
                Next
            </span>
        @endif
    </div>
@endif
