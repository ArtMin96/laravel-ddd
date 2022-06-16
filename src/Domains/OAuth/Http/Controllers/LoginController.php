<?php

declare(strict_types=1);

namespace Domains\OAuth\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;

final class LoginController
{
    public function __invoke(Request $request): RedirectResponse
    {
        /**
         * @var AbstractProvider $driver
         */
        $driver = Socialite::driver(
            driver: 'github'
        );

        return $driver->redirect();
    }
}
