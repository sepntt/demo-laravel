<?php

namespace App\Backend\Middleware;

use Closure;
use \Illuminate\Contracts\Foundation\Application;

class View
{
    /**
     * The application implementation.
     *
     * @var \Illuminate\Contracts\Foundation\Application
     */
    protected $app;

    /**
     * The URIs that should be accessible while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [];

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Foundation\Application  $app
     * @return void
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     *
     * @throws \Symfony\Component\HttpKernel\Exception\HttpException
     */
    public function handle($request, Closure $next)
    {
    	// dd(new \ReflectionClass($this->app));
    	// dd($request->route()->getAction());
    	// dd(new \ReflectionClass($request));
    	// dd($request);
    	$path = resource_path($this->getViewsPath($request));

    	$finder = app('view')->getFinder();
    	$finder->prependLocation($path);
        return $next($request);
    }

    /**
     * Perform any final actions for the request lifecycle.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Symfony\Component\HttpFoundation\Response  $response
     * @return void
     */
    public function terminate($request, $response)
    {

    }

    protected function getViewsPath($request)
    {
    	return config('modules.views.path');
    }
}
