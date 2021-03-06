@extends('adminlte::page')

@section('title', 'Meus Dados')

@section('content_header')
<h1></h1>
@stop

@section('content')
@include('alerts')

@isset($attr['msg'])

<div class="panel panel-default">
  <div class="panel-body">{{ $attr['msg'] }}</div>
</div>

@else
    <table class="table table-striped">
        <tbody>

            <tr>
                <td> <b>Seu nome </b> </td>
                <td>{{ $attr['display_name'] or '' }}</td>
            </tr>

            <tr>
                <td> <b> Email</b> </td>
                <td>{{ $attr['email'] or '' }}</td>
            </tr>

            <tr>
                <td> <b> Grupos </b> </td>
                <td>{{ $attr['grupos'] or '' }}</td>
            </tr>

            <tr>
                <td> <b> Conta criada em </b> </td>
                <td>{{ $attr['ativacao'] or '' }}</td>
            </tr>

            <tr>
                <td> <b> Essa conta expira em </b> </td>
                <td>{{ $attr['expira'] or "Não expira" }}</td>
            </tr>

            <tr>
                <td> <b> Data da última alteração da senha </b> </td>
                <td> {{ $attr['senha_alterada_em'] or '' }} </td>
            </tr>

            <tr>
                <td> <b> Status </b> </td>
                <td> {{ $attr['status'] or '' }} </td>
            </tr>

        </tbody>
    </table>

    <h2> Editar </h2>

    <div class="row">
        <div class="col-sm-4">
            <form method="POST" action="/ldapusers/{{ $attr['username'] }}">
                {{csrf_field()}}
                {{ method_field('PATCH') }}

                <div class="form-group">
                  <label for="usr"> Nova senha:</label>
                  <input type="password" class="form-control" name="senha">
                  <i> Não deve conter seu número USP ou seu nome. Deve conter maiúsculas, minúsculas, números e caracteres especiais (@#$%). Mínimo de 8 caracteres. </i>
                </div>

                <div class="form-group">
                  <label for="usr"> Repetir Nova senha:</label>
                  <input type="password" class="form-control" name="senha_confirmation">
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success"> Altera Senha </button>
                </div>
            </form>
        </div>
    </div>
@endisset

@stop

