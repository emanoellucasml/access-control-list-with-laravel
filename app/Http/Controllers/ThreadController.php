<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{

    public function __construct()
    {

    }

    public function index()
    {
        $threads = Thread::paginate(15);
        return view('thread.index', compact('threads'));
    }


    public function create()
    {
        return view('thread.create');
    }


    public function store(Request $request)
    {
        try{
            Thread::create($request->all());
            dd("tópico criado com sucesso");
        }catch(\Exception $e){
            dd($e->getMessage()); 
        }
    }


    public function show($id)
    {
        Thread::find($id);
        return view('thread.show', compact('thread'));
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        try{
            $thread = Thread::find($id);
            $thread->update($request->all());
            dd("tópico atualizado com sucesso");
        }catch(\Exception $e){
            dd($e->getMessage()); 
        }
    }


    public function destroy($id)
    {
        try{
            $thread = Thread::find($id);
            $thread->delete();
            dd("tópico removido com sucesso");
        }catch(\Exception $e){
            dd($e->getMessage()); 
        }
    }
}
