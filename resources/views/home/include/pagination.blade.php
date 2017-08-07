@section('frontend_index_body_content_home_pagination')
    <ul class="pagination">
        <li class="">
            <a href="{{ $links->previousPageUrl() }}">
                <i class="material-icons">chevron_left</i>
            </a>
        </li>
        <li class="">
            <a href="{{ $links->nextPageUrl() }}">
                <i class="material-icons">chevron_right</i>
            </a>
        </li>
    </ul>
@show