@extends('adminlte::page')

@section('title', 'SIGER -Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <p>You are logged in!</p>
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
          <td>Código da cidade</td>
          <td>Cidade / Estado</td>
          <td>Codigo do Estado</td>         
          <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($cidades as $cidades)
        <tr>
            <td>{{$cidades->id}}</td>
            <td>{{$cidades->cidade}} - {{ $cidades->estado->uf }}</td>
            <td>{{$cidades->idestados}}</td>
         <td><a href="{{ route('cidades.edit',$cidades->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('cidades.destroy', $cidades->id)}}" method="post">
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