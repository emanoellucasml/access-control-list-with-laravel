<?php

namespace App\Http\Controllers;
use App\Models\Thread;
use Illuminate\Http\Request;

class ThreadController extends Controller
{
    private $thread;

    public function __construct(Thread $thread)
    {
        $this->$thread = $thread;
    }

    public function index()
    {
        $threads = $this->thread->paginate(15);
        return view('thread.index', compact('threads'));
    }


    public function create()
    {
        return view('thread.create');
    }


    public function store(Request $request)
    {
        try{
            $this->thread->create($request->all());
            dd("tópico criado com sucesso");
        }catch(\Exception $e){
            dd($e->getMessage()); 
        }
    }


    public function show($id)
    {
        $thread = $this->thread->find($id);
        return view('thread.show', compact('thread'));
    }


    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        try{
            $thread = $this->thread->find($id);
            $thread->update($request->all());
            dd("tópico atualizado com sucesso");
        }catch(\Exception $e){
            dd($e->getMessage()); 
        }
    }


    public function destroy($id)
    {
        try{
            $thread = $this->thread->find($id);
            $thread->delete();
            dd("tópico removido com sucesso");
        }catch(\Exception $e){
            dd($e->getMessage()); 
        }
    }
}
