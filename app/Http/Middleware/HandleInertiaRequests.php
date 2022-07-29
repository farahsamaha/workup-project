<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that is loaded on the first page visit.
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determine the current asset version.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Define the props that are shared by default.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => function () use ($request) {
                return [
                    'user' => $request->user() ? [
                        'id' => $request->user()->id,
                        'name' => $request->user()->name,
                        'email' => $request->user()->email,
                    ] : null,

                    // 'job' => $request->job() ? [
                    //     'id' => $request->job()->id,
                    //     'title' => $request->job()->title,
                    //     'category' => $request->job()->category,
                    //     'place' => $request->job()->place,
                    //     'location' => $request->job()->location,
                    //     'type' => $request->job()->type,
                    //     'email' => $request->job()->email,
                    //     'description' => $request->job()->description,
                    // ] : null,

                ];
            },
            // 'can' => function () {
            //     return Auth::user()->permissions;
            // },
            'flash' => function () use ($request) {
                return [
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                ];
            },
            'ziggy' => function () {
                return (new Ziggy)->toArray();
            },
        ]);
    }
}
