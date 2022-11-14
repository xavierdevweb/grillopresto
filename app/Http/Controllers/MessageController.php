<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\MessageRequest;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(MessageRequest $request)
    {
        $validatedData = $request->validated();
        $message = Message::create($validatedData);
        return back()->with('successResponse', "Votre message a bien été envoyé - $message->created_at");
    }
}
