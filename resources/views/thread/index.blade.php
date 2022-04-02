@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h2>Tópicos</h2>
            <a href="{{route('threads.create')}}">novo tópico</a>
            <hr>
        </div>
        <div class="col-12">
        @forelse($threads as $thread)
            <div class="list-group mb-3">
                <a href="{{route('threads.show', $thread->id)}}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-center">
                    <div>
                        <h5>{{$thread->title}}</h5>
                        <small>Criado em {{$thread->created_at->diffForHumans()}}</small>
                        <span class="badge btn-primary mb-1">{{$thread->channel->name}}</span>
                    </div>
                    <span class="badge bg-warning">{{$thread->replies->count()}}</span>
                </a>
            </div>
        @empty
            <div class="alert alert-warning">
                Nenhum tópico encontrado.
            </div>
        @endforelse
        </div>
        {{$threads->links()}}
    </div>
@endsection
