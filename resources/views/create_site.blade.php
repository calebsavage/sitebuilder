


@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">New Site</div>

                    <div class="panel-body">
                        <div class="create_site_form">

                            {{ Form::open(array('url' => '/sites')) }}
                            {{ Form::label('slug', 'Slug') }}
                            {{ Form::text('slug') }}
                            <br>
                            {{ Form::label('title', 'Title') }}
                            {{ Form::text('title') }}
                            <br>
                            {{ Form::label('description', 'Description') }}
                            {{ Form::textarea('description') }}

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
