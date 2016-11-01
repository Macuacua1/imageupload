@extends('layouts.app')
@section('title', 'Listagem de livros')

@section('content')
    <h1>Ver o Livro</h1>

    <form class="form-horizontal">
        <div class="form-group">
            <label for="image" class="col-sm-2 control-label">Capa</label>
            <div class="col-sm-10">
                <img src="{{asset('img/'.$livro->image)}}" height="180" width="150" class="img-rounded">
            </div>
        </div>
        <div class="form-group">
            <label for="autor" class="col-sm-2 control-label">Autor</label>
            <div class="col-sm-10">
                {{$livro->autor}}
            </div>
        </div>
        <div class="form-group">
            <label for="titulo" class="col-sm-2 control-label">Titulo</label>
            <div class="col-sm-10">
                {{$livro->titulo}}
            </div>
        </div>
        <div class="form-group">
            <label for="editora" class="col-sm-2 control-label">Editora</label>
            <div class="col-sm-10">
                {{$livro->editora}}
            </div>
        </div>
        <div class="form-group">
            <label for="descricao" class="col-sm-2 control-label">Descrição</label>
            <div class="col-sm-10">
                {{$livro->descricao}}
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <a href="{{ url('livros')}}" class="btn btn-primary">voltar</a>
            </div>
        </div>
    </form>
@endsection