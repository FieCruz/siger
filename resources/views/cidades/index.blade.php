@extends('adminlte::page')

@section('title', 'SIGER -Sistema Gerenciador de Reservas')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
   
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
         
          <td><b>Cidade / Estado<b></td>  
          <td colspan="2"><b>Ações</b></td>
        </tr>
    </thead>
    <tbody>
        @foreach($cidades as $cidades)
        <tr>
            
            <td>{{$cidades->name}} - {{ $cidades->estado->abbr }}</td>
           
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