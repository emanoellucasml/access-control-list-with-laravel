@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    Criado por {{$thread->user->name}}
                </div> 
                <div class="card-body">
                    {{$thread->body}}
                </div>
                <div class="card-footer">
                    {{$thread->created_at->diffForHumans()}}
                </div>
            </div>
            <hr>
        </div>
    </div>
@endsection