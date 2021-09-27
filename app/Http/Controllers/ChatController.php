<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index($recipient_id)
    {
        $recipient = User::find($recipient_id);
        $author_id = Auth::id();
//        $messages = Message::select()
//            ->where('recipient_id', $recipient_id)
//            ->orWhere('recipient_id', $author_id)
//            ->get();

        $messages = Message::select()
            ->where([
                ['author_id', '=', $author_id],
                ['recipient_id', '=', $recipient_id]
            ])
            ->orWhere([
                ['author_id', '=', $recipient_id],
                ['recipient_id', '=', $author_id]
            ])
            ->orderBy('created_at')
            ->get();

//        dd($messages);

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
        $author_id = Auth::id();

        // create new message
        $message = new Message();
        $message->content = $request->message;
        $message->author_id = $author_id;
        $message->recipient_id = $recipient_id;
        $message->save();

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
