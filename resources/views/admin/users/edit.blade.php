@extends('layouts.master')

@section('h1', 'Editar Usuário')

@section('content')
    @if($usuarios->id != 1 || Auth::guard('admin')->id() == $usuarios->id)
        <div class="form-header-classic materialize">
            {{ Form::model($usuarios, ['class' => 'form-ladda', 'route' => ['admin.usuarios.edit', $usuarios->id]]) }}
            {{ Form::hidden('_method', 'POST') }}
            {{ Form::hidden('id') }}
            <fieldset class='informacoes'>
                <div class="card-box">
                    @include('admin.users.blocks.informacoes')
                </div>
            </fieldset>

            @include('admin.users.blocks.permissoes')

            <div class="form-wizard-buttons sticky-button">
                <button type="submit" class="btn btn-success btn-block btn-small ladda-button">Salvar</button>
            </div>
            {{ Form::close() }}
        </div>
    @endif
@endsection

@section('css')
@endsection

@section('scripts')
    <script>
        var grupoUrl = '{{route('admin.grupos.permissoes')}}';
    </script>
    <script src="{{asset('js/admin/usuarios/grupo_permissoes.js')}}"></script>
@endsection
