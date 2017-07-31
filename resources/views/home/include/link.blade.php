{{-- Link --}}
<a href="{{ $link['url']['full'] }}" class="collection-item">
    <span class="grey-text">
        {{ $link['name'] }}
    </span>
    <span>
        {{ $link['url']['domainname'] }}
    </span>

    <span class="new badge grey" data-badge-caption="Kommentare">
        {{ $link['comments'] }}
    </span>
    <span class="new badge grey lighten-1" data-badge-caption="Bewertungen">{{ $link['votes'] }}</span>
    <span class="new badge red darken-1" data-badge-caption="{{ $link['label'] }}"></span>
</a>
