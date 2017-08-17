{{-- link --}}
<a href="{{ $link->fqdn->full_qualified_link }}" class="collection-item">
    {{-- link name --}}
    <span class="grey-text">
        {{ str_limit($link->details->name, 50) }}
    </span>

    {{-- link domain --}}
    <span>
        ({{ $link->fqdn->host }})
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
    @foreach($link->labels as $label)
        <span class="new badge black" data-badge-caption="">
            {{ $label->name }}
        </span>
    @endforeach
</a>
