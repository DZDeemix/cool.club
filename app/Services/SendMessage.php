<?php

namespace App\Services;

use Illuminate\Http\Request;

class SendMessage
{
    public $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function sendMessage(): string
    {
        return 'сообщение ' . $this->request->get('message_content') . ' отправлено';
    }
}
