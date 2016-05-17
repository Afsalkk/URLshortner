<!-- resources/views/urlblade.php -->

@extends('layouts.app') 

@section('content')

    <!-- Bootstrap boilerplate -->

    <div class="panel-body">
        <!-- Display validation errors -->
        @include('common.errors')

        <!-- Add url form -->
        <form action="{{ url('url') }}" method="POSt" class="form-horizontal">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
             

            <!-- url -->
            <div class="form-group">
                <label for="url" class="col-sm-3 control-label">Url</label>

                <div class="col-sm-6">
                    <input type="text" name="url" id="url" class="form-control" @if (old('url')) value="{{ old('url') }}" @endif></input>
                </div>
            </div>

            <!-- shortened url -->
            <div class="form-group">
                <label for="hash" class="col-sm-3 control-label">Shortened Url</label>

                <div class="col-sm-6 hash">
                    
                </div>
            </div>

            <!-- Shorten button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" id="btn-shorten" class="btn btn-default btn-shorten" >
                        <i class="glyphicon glyphicon-resize-small"></i> Shorten
                    </button>
                </div>
            </div>
        </form>
    </div>
    @section('js')
        <script type="text/javascript">
            $(document).ready(function () {
                $("#btn-shorten").click(function (e) {alert('da')
                    // body...
                    e.preventDefault();
                    var isValid;
                    if (!$("#url").val()) {
                        isValid = false;
                        $("#url").removeClass("valid").addClass("invalid"); 
                    } else {
                        isValid = true;
                        $("#url").removeClass("invalid").addClass("valid"); 
                    }
                    if ( isValid == true ) {
                        var url = $("#url").val();
                        var token = $('meta[name="csrf-token"]').attr('content');alert(token)
                        $.ajax({
                            
                            url: "url",
                            data: { url : url, token : token },
                            method: "post",
                            success: function (result) {alert(result)
                                // body...
                                if (result != 2) {
                                    $(".hash").text("<a href='"+url+"'>result</a>");
                                } else {
                                    $(".alert-success").text("Please fill required fields.");
                                }
                            }
                        });
                    } 
                });
            });
            
        </script>
    @endsection

@endsection