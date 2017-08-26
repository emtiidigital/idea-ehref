@extends('index.index')

@section('frontend_index_body_content_inner')
    <div class="container">
        <div class="section">

            <div class="row">
                <form class="col s12">
                    <div class="row">
                        {{-- Filter Selects --}}
                        @include('home.include.filter')
                        {{-- Sort Select --}}
                        {{--
                            @include('home.include.sort')
                        --}}
                    </div>
                </form>
            </div>

            <div class="divider"></div>

            {{-- Link List --}}
            <div class="row">
                <div class="col s12">
                    <div class="collection">
                        @each('includes.link', $links, 'link', 'home.include.link_empty')
                    </div>
                </div>
            </div>

            {{-- Pagination --}}
            <div class="row">
                <div class="right">
                    @include('home.include.pagination')
                </div>
            </div>
        </div>
    </div>
@endsection