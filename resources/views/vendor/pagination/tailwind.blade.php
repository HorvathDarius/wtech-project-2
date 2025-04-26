@if ($paginator->hasPages())
    <div class="w-full h-10 flex justify-center mt-8">
        <nav class="w-full h-full flex gap-2 items-center justify-center px-10 font-bold">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <span class="text-gray-400">&lt;</span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}" class="cursor-pointer">&lt;</a>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span class="flex text-white bg-primary w-6 h-8 justify-center items-center rounded-lg">{{ $page }}</span>
                        @else
                            <a href="{{ $url }}" class="flex w-6 h-8 justify-center items-center rounded-lg">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}" class="cursor-pointer">&gt;</a>
            @else
                <span class="text-gray-400">&gt;</span>
            @endif
        </nav>
    </div>
@endif
