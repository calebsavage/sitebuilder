@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">All Sites

                        <a href="{{ url('/sites/create') }}" class="btn btn-primary" style="float:right">Add  <span class="glyphicon glyphicon-plus-sign"></span></a>
                    </div>

                    <div class="panel-body">
                        <div id="tabs">
                            <ul>
                                @if(Auth::id())
                                    <li><a href="#tabs-1">My Sites</a></li>
                                @endif
                                <li><a href="#tabs-2">All Sites</a></li>
                            </ul>

                            @if(Auth::id())
                            <div id="tabs-1">
                                @foreach ($my_sites as $site)
                                    <li>{{ link_to($site->slug, $site->title) }}
                                        @if ($site->user_id == Auth::id())
                                            {{link_to('/'.$site->slug.'/create', ' (Add Page)')}}
                                        @endif
                                    </li>
                                    <ul>
                                        @foreach ($site->pages() as $page)
                                            <li>{{link_to('/'.$page->site()->slug.'/'.$page->slug, $page->title)}}

                                                @if ($page->site()->user_id == Auth::id())
                                                    {{link_to('/'.$page->site()->slug.'/'.$page->slug.'/edit', ' (edit)')}}
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @endforeach

                            </div>
                            @endif
                            <div id="tabs-2">
                                <ul>
                                    @foreach ($sites as $site)
                                        <li>{{ link_to($site->slug, $site->title) }} • {{ $site->user()->name }}
                                            @if ($site->user_id == Auth::id())
                                                {{link_to('/'.$site->slug.'/create', ' (Add Page)')}}
                                            @endif
                                        </li>
                                        <ul>
                                            @foreach ($site->pages() as $page)
                                                <li>{{link_to('/'.$page->site()->slug.'/'.$page->slug, $page->title)}}

                                                    @if ($page->site()->user_id == Auth::id())
                                                        {{link_to('/'.$page->site()->slug.'/'.$page->slug.'/edit', ' (edit)')}}
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    @endforeach
                                </ul>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $( function() {
            $( "#tabs" ).tabs();
        } );
    </script>
@endsection
