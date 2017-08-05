{{-- link --}}
<a href="{{ $linkdata['url']['full'] }}" class="collection-item">
    {{-- link name --}}
    <span class="grey-text">
        {{ $linkdata['name'] }}
    </span>

    {{-- link domain --}}
    <span>
        ({{ $linkdata['url']['domainname'] }})
    </span>

    {{-- detail link to comments --}}
    {{--
    <a href='{{ $linkdata['detail_url'] }}'>
        <span class="new badge grey" data-badge-caption="Kommentare">
            {{ $linkdata['comments'] }}
        </span>
    </a>
    --}}

    {{-- badge votes --}}
    {{--
    <span class="new badge grey lighten-1" data-badge-caption="Bewertungen">
        {{ $linkdata['votes'] }}
    </span>
    --}}

    {{-- badge label --}}
    <span class="new badge red darken-1" data-badge-caption="{{ $linkdata['label'] }}">
    </span>
</a>
