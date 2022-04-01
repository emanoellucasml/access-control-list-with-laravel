@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Criar tópico</h2>
            <hr>
        </div>
        <div class="col-12">
            <form action="{{route('threads.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label for="">Título do tópico</label>
                    <input class="form-control" type="text" value="{{old('title')}}" name="title">                    
                </div>

                <div class="form-group">
                    <label for="">Conteúdo do tópico</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                </div>

                <div class="form-group mt-2">
                    <button class="btn btn-lg btn-success" type="submit">Salvar</button>
                </div>
            </form>
        </div>
    </div>
@endsection