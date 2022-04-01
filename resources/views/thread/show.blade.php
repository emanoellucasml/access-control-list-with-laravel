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
                    <a href="{{route('threads.edit', $thread->id)}}" class="btn btn-sm btn-primary">Editar</a>
                    
                    <form style="display: inline-block;" action="{{route('threads.destroy', $thread->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button class="btn btn-sm btn-danger">Remover</button>
                    </form>
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection