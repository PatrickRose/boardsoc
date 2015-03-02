<?php namespace BoardSoc\Http\Middleware;

use Closure;
use Illuminate\Auth\Guard;
use Laracasts\Flash\FlashNotifier;

class AuthenticateAdmin
{

    /**
     * @var Authenticate
     */
    private $authenticate;
    /**
     * @var Guard
     */
    private $guard;
    /**
     * @var FlashNotifier
     */
    private $flashNotifier;

    function __construct(
        Guard $guard,
        Authenticate $authenticate,
        FlashNotifier $flashNotifier
    ) {
        $this->authenticate = $authenticate;
        $this->guard = $guard;
        $this->flashNotifier = $flashNotifier;
    }


    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure                 $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!$this->guard->user()) {
            return $this->authenticate->handle($request, $next);
        }

        if (!$this->guard->user()->is_committee) {
            $this->flashNotifier->error('You are not authorised to do that');

            return redirect('/');
        }

        return $next($request);
    }

}
