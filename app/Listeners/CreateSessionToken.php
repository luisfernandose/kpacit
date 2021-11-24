<?php

namespace App\Listeners;

use App\Models\UserSession;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Str;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class CreateSessionToken
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $token = new UserSession();
        $token->user_id = $event->user->id;
        $token->token = Str::random(16);
        $token->save();

        session(['token' => $token->token]);

        $tokens = UserSession::select(
                'id',
                'token'
            )
            ->where('user_id', Auth::id())
            ->orderBy('created_at', 'DESC')
            ->limit(3)
            ->get();

        $ids = $tokens->pluck('id')->all();

        UserSession::where('user_id', Auth::id())
            ->whereNotIn('id', $ids)
            ->delete();

    }
}
