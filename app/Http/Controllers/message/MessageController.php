<?php

namespace App\Http\Controllers\Message;

use App\Accomodation;
use App\Http\Controllers\Controller;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function create($id)
    {
        $accomodation = Accomodation::findOrFail($id);
        return view('message.create', compact('accomodation'));
    }

    public function store(Request $request, $id)
    {
        $request->validate(
            [
                'object_email' => 'required|string|min:1|max:255',
                'content' => 'required|string|min:5|max:1000',
                'email_sender' => 'required|string|max:255',
            ]);

        $message = new Message();
        $data = $request->all();
        $message->fill($data);
        $message->accomodation_id = $id;
        $message->save();

        return redirect()->route('guest.show', $id);
    }

    public function index($id)
    {
        $messages = Message::where('accomodation_id', $id)->get();
         return view('message.index', ['messages' => $messages]);
    }

    public function show($id)
    {
        $message = Message::findOrFail($id);
        return view('message.show', compact('message'));

    }
}
