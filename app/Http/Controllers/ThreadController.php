<?php

namespace App\Http\Controllers;
use App\Models\Channel;
use App\Models\Thread;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;

class ThreadController extends Controller
{

    public function __construct()
    {

    }

    public function index(Request  $request)
    {
        $channel = $request->get('channel');
        $threads = Thread::orderBy('created_at', 'DESC')->paginate(15);
        if($channel){
            $threads = Thread::whereHas('channel', function($query) use($channel){
               return $query->where('id', $channel);
            });
            $threads = $threads->orderBy('created_at', 'DESC')->paginate(15);
        }
        return view('thread.index', compact('threads',));
    }


    public function create()
    {
        $channels = Channel::all();
        return view('thread.create', compact('channels'));
    }


    public function store(Request $request)
    {
        try{

            $data = array_merge($request->all(),
                    ['slug' => Str::slug($request->get('title'))]);

            $user = User::first();
            $user->threads()->create($data);
            return redirect()
                    ->route('threads.index')
                    ->with(['success' => 'Tópico criado com sucesso!']);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }


    public function show($id)
    {
        $thread = Thread::with(['replies'])->findOrFail($id);
        return view('thread.show', compact('thread'));
    }


    public function edit($id)
    {
        $thread = Thread::find($id);
        return view('thread.edit', compact('thread'));
    }


    public function update(Request $request, $id)
    {
        try{
            $thread = Thread::find($id);
            $thread->update($request->all());
            return redirect()
                    ->route('threads.index')
                    ->with(['success' => 'Atualizado com sucesso!']);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }


    public function destroy($id)
    {
        try{
            $thread = Thread::find($id);
            $thread->delete();
            return redirect()
                    ->route('threads.index')
                    ->with(['success' => 'Tópico removido com sucesso.']);
        }catch(\Exception $e){
            dd($e->getMessage());
        }
    }
}
