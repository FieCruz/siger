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
          <td>ID</td>
          <td>Descrição do Campus:</td>
          <td>Endereço do Campus:</td>
          <td>Telefone do Campus:</td>
	        <td>Cidade:</td>
          <td colspan="2">Ações</td>
        </tr>
    </thead>
    <tbody>
        @foreach($campus as $campus)
        <tr>
            <td>{{$campus->id}}</td>
            <td>{{$campus->descricao}}</td>
            <td>{{$campus->endereco}}</td>
            <td>{{$campus->telefone}}</td>
            <td>{{ $campus->city->cidade }}</td>
            <td><a href="{{ route('campus.edit',$campus->id)}}" class="btn btn-primary">Editar</a></td>
            <td>
                <form action="{{ route('campus.destroy', $campus->id)}}" method="post">
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