<?php

namespace App\Http\Controllers;

use App\Services\SendMessage;
use App\Http\Requests\UserMessageRequest;
use App\Models\UserMessage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserMessageController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param UserMessageRequest $request
     * @param SendMessage $sender
     * @return Response
     */
    public function store(UserMessageRequest $request, SendMessage $sender)
    {
        $userMessage = new UserMessage();
        $userMessage->user_id = Auth::id();
        $userMessage->fill($request->all());

        $userMessage->save();

        $userMessage = $sender->sendMessage();
        return response(['message' => $userMessage], 201);
    }
}
