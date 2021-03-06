@extends('layouts.master')

@section('h1', 'Editar Grupo')

@section('content')
    <div class="form-header-classic materialize">
        {{ Form::model($grupo, ['class' => 'form-ladda', 'route' => ['admin.grupos.edit', $grupo->id]]) }}
        {{ Form::hidden('_method', 'POST') }}
        {{ Form::hidden('id') }}
        <fieldset class='formulario'>
            <div class="card-box">
                @include('admin.guilds.blocks.formulario')
            </div>
        </fieldset>

        @include('admin.users.blocks.permissoes')

        <div class="form-wizard-buttons sticky-button">
            <button type="submit" class="btn btn-success btn-block btn-small ladda-button">Salvar</button>
        </div>
        {{ Form::close() }}
    </div>
@endsection

@section('css')
@endsection

@section('scripts')
@endsection
