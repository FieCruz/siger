@extends('adminlte::page')

@section('title', 'SIGER- Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
<p>You are logged in!  </p>
<hr>

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td><b>Código do horario:</b></td>
          <td><b>Horario:</b></td>
          <td><b>Turno:</b></td>
                <td colspan="2"><b>Ações</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($horarios as $horarios)
        <tr>
            <td>{{$horarios->id}}</td>
            <td>{{$horarios->horario}}</td>
            <td>{{$horarios->turno}}</td>
            
            <td><a href="{{ route('horarios.edit',$horarios->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('horarios.destroy', $horarios->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
@stop