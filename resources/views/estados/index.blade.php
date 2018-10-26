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
          <td><b>Código do estado:</b></td>
          <td><b>Nome da UF:</b></td>
          <td><b>UF:</b></td>
                <td colspan="2"><b>Ações</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($estados as $estados)
        <tr>
            <td>{{$estados->id}}</td>
            <td>{{$estados->nomeuf}}</td>
            <td>{{$estados->uf}}</td>
            
            <td><a href="{{ route('estados.edit',$estados->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('estados.destroy', $estados->id)}}" method="post">
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