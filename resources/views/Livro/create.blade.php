@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Registo de Livros</div>
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong> Preencha correctamente os campos!
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                <strong>{{ $message }}</strong>
                            </div>
                            {{--<img src="images/{{ Session::get('image') }}">--}}
                        @endif

                        {!!Form::open(array('route' => 'livros.store','method'=>'post','files'=>true))  !!}

                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('titulo', 'Titulo') !!}
                                {!! Form::text('titulo','',['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('autor', 'Autor') !!}
                                {!! Form::text('autor','',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('image', 'Imagem') !!}
                                {!! Form::file('image','',['class'=>'form-control']) !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::label('editora', 'Editora') !!}
                                {!! Form::text('editora','',['class'=>'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6">
                                {!! Form::label('publicacao', 'Ano de Publicacao') !!}
                                {!! Form::date('publicacao','',['class'=>'form-control']) !!}

                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                {!! Form::label('descricao', 'Descricao') !!}
                                {!! Form::textarea('descricao','',['class'=>'form-control']) !!}
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-11 ">

                                {!!Form::submit('Registar',['class'=>'btn btn-primary pull-right']) !!}
                            </div>
                        </div>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>

@endsection
