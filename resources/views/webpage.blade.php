@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">{{$text}}</div>
                <div class="panel-body form-horizontal">
                    {{ Form::open(array('url' => '/test2', 'method' => 'GET'))}}
                    {{ csrf_field() }}

                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

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
                                    search
                                </button>                             

                            </div>
                        </div>
                        {{ Form::close() }}
                    </div>
                    <a class="btn btn-link" href="{{ url('/insert') }}">                              
                        INSERT ARTIST
                    </a>
                    @if($show)

                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr> 
                                <th class="center">ชื่ออลบั้ม</th>
                                <th class="center">ชื่อศิลปิน</th>
                                <th class="center">ราคาทุน</th>
                                <th class="center">ราคาขาย</th>
                            </tr>
                        </thead>
                        <tbody>
                            @for($i = 0 ; $i<$num;$i++)
                            <tr class=" gradeX">
                                <td>{{$qry[$i]->name}}</td>
                                <td>{{$name}}</td>
                                <td>{{$qry[$i]->cost}}</td>
                                <td>{{$qry[$i]->prize}}</td>


                            </tr>
                            @endfor
                        </tbody>
                        @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
