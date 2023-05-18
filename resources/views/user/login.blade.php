@extends('layout.default')
@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif
@section('main')
    <div class="container border col-5 col-xs-4 col-sm-4 col-lg-3 col-md-4 mt-5 bg-dark text-light">
        <div class="box mt-2">
            <div class="box-header">
                <div class="box-title">
                    <h1>{{$title}}</h1>
                </div>
                <br>
            </div>
        </div>
        {{ Form::open(['class' => 'form-horizontal','method' => 'POST', 'route' => 'user.login',
        'enctype' => 'multipart/form-data']) }}
        <div class="box-body">
            <div class="form-group">
                {{ Form::label('email', 'Email', ['class' => 'control-label col-md-3 col-lg-2']) }}
                {{ Form::text('email', null, ['class' => 'form-control', 'rows' => 4]) }}
                @if($errors->has('email'))
                    <div class="alert alert-danger">
                        {!! $errors->first('email')!!}
                    </div>
                @endif

            </div>
            <div class="form-group">
                {!! Form::label('password', 'Senha') !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
                @if($errors->has('password'))
                    <div class="alert alert-danger">
                        {{ $errors->first('password') }}
                    </div>
                @endif
            </div>
             </div>
        </div>
        <div class="box-footer mb-2 text-end">
            <br>
            <button type="submit" class="btn btn-primary btn-submit ">CADASTRAR</button>
        </div>
        {{ Form::close() }}
    </div>

@endsection



