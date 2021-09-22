<?php

namespace App\Http\Controllers;

use App\Models\Chat;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($recipient_id)
    {
        $recipient = User::where('id', $recipient_id)->get();
        $author_id = Auth::id();
        $messages = Chat::select(['chat.*', 'messages.*'])
            ->join('messages', 'messages.id', '=', 'chat.message_id')
            ->where('recipient_id', $recipient_id)
            ->orWhere('recipient_id', $author_id)
            ->get();

        return view('chat.chat', [
            'recipient' => $recipient,
            'author_id' => $author_id,
            'messages' => $messages
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request, $recipient_id)
    {
        $user = Auth::user();
        $author_id = $user->id;

        // create new message
        $message = new Message();
        $message->content = $request->message;
        $message->author_id = $author_id;
        $message->save();

        // create new entry in chat
        $chat = new Chat();
        $chat->recipient_id = $recipient_id;
        $chat->message_id = $message->id;
        $chat->save();

        return redirect()->route('chat.show', ['profile' => $recipient_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
