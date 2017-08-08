{{-- link --}}
<a href="{{ $link->fqdn->full_qualified_link }}" class="collection-item">
    {{-- link name --}}
    <span class="grey-text">
        {{ $link->details->name }}
    </span>

    {{-- link domain --}}
    <span>
        ({{ $link->fqdn->second_level_label }})
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
    {{--
    <span class="new badge red darken-1" data-badge-caption="{{ $link->label->label_id }}"></span>
    --}}
</a>
