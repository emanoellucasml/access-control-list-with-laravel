@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Editar tópico</h2>
            <hr>
        </div>
        <div class="col-12">
            <form action="{{route('threads.update', $thread->id)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">Título do tópico</label>
                    <input class="form-control" type="text" value="{{$thread->title}}" name="title">                    
                </div>

                <div class="form-group">
                    <label for="">Conteúdo do tópico</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{$thread->body}}</textarea>
                </div>

                <div class="form-group mt-2">
                    <button class="btn btn-lg btn-success" type="submit">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
@endsection