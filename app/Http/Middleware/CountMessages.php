<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class CountMessages
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $count = Auth::user()->getCountMessages();
        if ($count >= Config::get('user_massage.max_day_count_messages')) {
            return response(['message' => 'Исчерпан лимит сообщений на сегодня'], 400);
        }

        return $next($request);
    }
}
