@section('frontend_index_body_footer')

    <div class="container">
        <div class="divider"></div>
        <div class="section"></div>


        <blockquote>
            <a class="black-text" href="{{ route('imprint') }}">
                @lang('Imprint')
            </a>
            {{--
            <a class="black-text" href="">
                @lang('Guidelines')
            </a> |
            <a class="black-text" href="">
                @lang('FAQ')
            </a>
            --}}
        </blockquote>

    </div>

    @include('index.body.footer.js')
@show