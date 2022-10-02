<th class=" {{ $attributes->merge(['class' => 'px-6 py-3 bg-cool-gray-50 w-full items-center'])->only('class') }}">
    @if( !$attributes['sortable'])
        <span
            class="text-left text-xs leading-4 font-medium text-cool-gray-500 uppercase tracking-wider">{{ $slot }}</span>
    @else
        <button
            {{ $attributes->except('class') }} class="flex items-center space-x-1 text-center text-xs leading-4 font-medium">
            <span> {{ $slot }} </span>
            <span>
                @if( $attributes['direction'] === 'asc')
                    <i class="w-3 h-3 fa fa-sort-asc"></i>
                    {{--                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2001/XInclude"></svg>--}}
                @elseif( $attributes['direction'] === 'desc')
                    <i class="w-3 h-3 fa fa-sort-desc"></i>
                    {{--                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2001/XInclude"></svg>--}}
                @else
                    {{--                    <svg class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300" fill="none"--}}
                    {{--                         stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2001/XInclude"></svg>--}}
                    <i class="w-3 h-3 opacity-0 group-hover:opacity-100 transition-opacity duration-300 fa fa-sort"></i>
                @endif
            </span>
        </button>
    @endif
</th>
