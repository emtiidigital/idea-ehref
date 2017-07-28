@extends('index.index')

@section('frontend_index_body_content_inner')
    <div class="container">
        <div class="section">

            <div class="row">
                <div class="col s12">
                    @include('home.links')
                </div>
            </div>

            <div class="row">
                <div class="right">
                    @include('home.pagination')
                </div>
            </div>

        </div>
    </div>
@endsection