@extends('layout.css')
@extends('layout.js')
<div class="gradient-custom">
    <div class="box">
        <div class="box-header">
            <div class="box-title">
                <h1>{{$title}}</h1>
            </div>
            <br>
        </div>
        <div class="box-body">
            <div class="form-group">
                {!! Form::model($disco, ['method' => 'PATCH', 'route' => ['disco.update',$disco->id_disco]]) !!}
                {{ Form::label('ds_disco', 'Nome') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('ds_disco',$disco->ds_disco , ['autofocus']) }}
                </div>
            </div>
            <div class="form-group">
                {{ Form::label('ano', 'Ano') }}
                <div class="col-md-7 col-lg-7">
                    {{ Form::text('ano',$disco->ano , ['autofocus']) }}
                </div>
            </div>
            <br>
            <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-submit">SALVAR ALTERAÇÕES</button>
                {{Form::close()}}
            </div>
        </div>
    </div>
</div>


