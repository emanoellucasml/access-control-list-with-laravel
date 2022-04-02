@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Criado por {{$thread->user->name}} <span class="font-italic" style="font-style: italic;">{{$thread->created_at->diffForHumans()}}</span>
                </div>
                <div class="card-body">
                    {{$thread->body}}
                </div>
                <div class="card-footer">
                    <a href="{{route('threads.edit', $thread->id)}}" id="btnEditar" class="btn btn-sm btn-primary">Editar</a>

                    <form style="display: inline-block;" action="{{route('threads.destroy', $thread->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>

        <div class="col-12">
            <h3>Respostas</h3>
            <hr>
            @forelse($thread->replies as $reply)
                <div class="card mb-3">
                    <div class="card-body">{{$reply->reply}}</div>
                    <div class="card-footer">Criado por {{$reply->user->name}} <span class="font-italic" style="font-style: italic;">{{$reply->created_at->diffForHumans()}}</span></div>
                </div>
            @empty
                sem respostas
            @endforelse
        </div>

        <div class="col-12">
            <hr>
            <form action="{{route('reply.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-group">
                    <input type="hidden" name="thread_id" value="{{$thread->id}}">
                    <label for="reply">Responder</label>
                    <textarea name="reply" class="form-control" id="reply" cols="30" rows="6"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-success">responder</button>
            </form>
        </div>
    </div>
@endsection
