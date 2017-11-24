@extends('layouts.app')

@section('content')

    {{ Form::model($page, ['page/update', $page]) }}
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3>Edit {{ Form::text('title') }}</h3>{{ Form::text('template') }}
                    </div>

                    <div class="panel-body">
                        {{ Form::hidden('page_id', $page->id) }}
                        {{ Form::hidden('content') }}
     {{ Form::close() }}                    <br>


                        <div id="summernote"><p>{{ $page->content }}</p></div>
                        <button class="btn btn-primary" id="sub1">Butt</button>
                        <script>
                            $(document).ready(function() {
                                $('#summernote').summernote();
                                $('#sub1').click(function(){
                                    $( "input[value='content']" ).val($('#summernote').summernote('code'));
                                   //$(form).submit();
                                })

                            });
                        </script>



                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
