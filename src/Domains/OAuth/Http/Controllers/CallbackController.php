<?php

declare(strict_types=1);

namespace Domains\OAuth\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Infrastructure\OAuth\Commands\GithubLoginCommandContract;
use Infrastructure\OAuth\Factories\UserFactoryContract;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\AbstractProvider;

final class CallbackController
{
    public function __invoke(
        Request $request,
        UserFactoryContract $factory,
        GithubLoginCommandContract $command
    ): RedirectResponse {
        /**
         * @var AbstractProvider
         */
        $driver = Socialite::driver(
            driver: 'github'
        );

        $user = $driver->user();

        list($firstName, $lastName) = explode(' ', $user->user['name']);

        $command->handle(
            user: $factory->make(
                attributes: [
                    'id' => $user->getId(),
                    'firstName' => $firstName,
                    'lastName' => $lastName,
                    'username' => $user->user['login'],
                    'avatar' => $user->getAvatar(),
                    'email' => $user->getEmail(),
                    'password' => bcrypt('password'),
                ]
            ),
            provider: 'github',
            providerID: $user->getId()
        );

        return Redirect::to(path: '/');
    }
}
