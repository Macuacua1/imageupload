@extends('layouts.app')
@section('title', 'Listagem de Membros')

@section('content')
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a href="{{url('/livros/create')}}" class="btn btn-success">Adicionar um novo Livro</a>
            </div>
            <ul class="nav navbar-nav">

                <li><a href="{{url('/livros/create')}}" class="btn btn-success">Adicionar um novo Livro</a></li>

            </ul>
        </nav>

        <h1>Listagem de Livros </h1>

        @if (Session::has('message'))
            <div class="alert alert-info">{{ Session::get('message') }}</div>
        @endif

        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr class="bg-info">
                <th>Titulo</th>
                <th>Autor</th>
                <th>Publicação</th>
                <th>Editora</th>
                <th>Descrição</th>
                <th>Imagem</th>
                <th colspan="3">Ação</th>
            </tr>
            </thead>
            <tbody>
            @foreach($livros as $livro)
                <tr>
                    <td>{{ $livro->titulo }}</td>
                    <td>{{ $livro->autor }}</td>
                    <td>{{ $livro->publicacao }}</td>
                    <td>{{ $livro->editora }}</td>
                    <td>{{ $livro->descricao }}</td>
                    <td><img src="{{asset('img/'.$livro->image)}}" height="35" width="30"></td>
                    <td><a href="{{url('livros',$livro->id)}}" class="btn btn-primary">Ler</a></td>
                    <td><a href="{{route('livros.edit',$livro->id)}}" class="btn btn-warning">Alterar</a></td>
                    <td>
                        {!! Form::open(['method' => 'DELETE', 'route'=>['livros.destroy', $livro->id]]) !!}
                        {!! Form::submit('Apagar', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>




                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
@endsection