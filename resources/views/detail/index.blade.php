@extends('index.index')

@section('frontend_index_body_content_inner')
    <div class="container">
        <div class="section">

            {{-- Link --}}
            <div class="row">
                <div class="col s12">
                    <div class="collection">
                        @include('includes.link', $linkdata)
                    </div>
                </div>
            </div>

            {{-- Add new comments --}}
            <div class="row">
                <form class="col s12">
                    <div class="col s8">
                        @include('detail.include.new_comment')
                    </div>
                    <div class="col s4">
                        <a class="waves-effect waves-light btn">@lang('Save Comment')</a>
                    </div>
                </form>
            </div>

            {{-- Show all available comments --}}
            <div class="row">
                @include('detail.include.all_comments')
            </div>
        </div>
    </div>
@endsection