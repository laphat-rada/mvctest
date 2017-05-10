@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"></div>
                <div class="panel-body form-horizontal">
                    {{ Form::open(array('url' => '/save', 'method' => 'GET'))}}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group">
                            <label for="sel1"  class="col-md-4 control-label">Album</label>
                            <div class="col-md-7">
                                {{ Form::select('art', $art, null, ['class'=>'form-control ']) }}
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Type</label>

                                <div class="col-md-6">
                                    <input id="type" type="text" class="form-control" name="type" value="{{ old('Type') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                <label for="name" class="col-md-4 control-label">Artist name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        insert
                                    </button>

                                    

                                </div>
                            </div>
                        <a class="btn btn-link" href="{{ url('/test1') }}">                              
                        SELECT ARTIST
                    </a>
                            {{ Form::close() }}
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
