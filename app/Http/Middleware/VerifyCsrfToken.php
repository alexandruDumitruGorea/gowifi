<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * Indicates whether the XSRF-TOKEN cookie should be set on the response.
     *
     * @var bool
     */
    protected $addHttpCookie = true;

    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
<<<<<<< HEAD
        'logout','login','register', 'role', 'technical', 'accesspoint', 'connectionuser', 'password/email', 'password/reset', 'connection', 'activehour', 'delactivehour/*'
=======
        'logout','login','register', 'role', 'technical', 'accesspoint', 'accesspoint/*', 'connectionuser', 'password/email', 'password/reset', 'connection', 'activehour'
>>>>>>> 4889006759b88a8eddb06f11566d8c317323bf92
    ];
}
