<!-- resources/views/urlblade.php -->

@extends('layouts.app') 

@section('content')

    <!-- Bootstrap boilerplate -->

    <div class="panel-body">
        <!-- Display validation errors -->
        

        <!-- Add url form -->
        <form action="{{ url('task') }}" method="POSt" class="form-horizontal">
            {!! csrf_field() !!}

            <!-- url -->
            <div class="form-group">
                <label for="url" class="col-sm-3 control-label">Url</label>

                <div class="col-sm-6">
                    <input type="text" name="url" id="url" class="form-control"></input>
                </div>
            </div>

            <!-- Shorten button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default" >
                        <i class="glyphicon glyphicon-resize-small"></i> Shorten
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection