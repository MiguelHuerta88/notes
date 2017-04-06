<?php
/**
 * Created by PhpStorm.
 * User: MiguelHuerta
 * Date: 4/6/17
 * Time: 1:48 PM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Note;

class Owner
{
    public function __construct(Note $note)
    {
        $this->note = $note;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $note = $this->note->find($request->id);
        $userId = Auth::id();

        if($note && $userId != $note->user_id) {
            return response()->json(['message' => 'You are not the owner of this note']);
        }
        return $next($request);
    }
}