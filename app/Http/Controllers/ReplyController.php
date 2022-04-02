<?php

namespace App\Http\Controllers;

use App\Models\Thread;
use App\Http\Requests\ReplyRequest;

class ReplyController extends Controller
{
    public function store(ReplyRequest $request)
    {
        try{
            $data = $request->all();
            $data['user_id'] = 1;
            $thread = Thread::findOrFail($request->thread_id);
            $thread->replies()->create($data);
            return redirect()->back()->with(['success' => 'Resposta adicionada com sucesso.']);
        }catch(\Exception $e){
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
}


