@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>{{ $page->title }}</h3>@if ($page->site()->user_id = Auth::id())

                            {{link_to('/'.$page->site()->slug.'/'.$page->slug.'/edit', ' (edit)')}}
                        @endif
                    </div>

                    <div class="panel-body">
                        {{ $page->content }}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
