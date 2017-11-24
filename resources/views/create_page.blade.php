@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading"> New Page</div>

                    <div class="panel-body">
                        <div class="create_page_form">

                            {{ Form::open(array('url' => '/pages')) }}
                            {{ Form::label('slug', 'Slug') }}
                            {{ Form::text('slug') }}
                            <br>

                            {{ Form::hidden('site_id', $site->id) }}
                            <br>
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title') }}

                            <br>
                            {{ Form::label('template', 'Template') }}
                            {{ Form::text('template','default') }}
                            <br>

                            {{ Form::label('content', 'Content') }}
                            {{ Form::textarea('content') }}

                            {{ Form::token() }}

                            {{ Form::submit() }}
                            {{ Form::close() }}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
