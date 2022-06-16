<?php

namespace Domains\OAuth\Commands;

use Domains\OAuth\Models\User;
use Infrastructure\OAuth\Commands\GithubLoginCommandContract;
use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

class GithubLoginCommand implements GithubLoginCommandContract
{
    /**
     * @param UserDataObjectContract $user
     * @param string                 $provider
     * @param string|int             $providerID
     *
     * @return void
     */
    public function handle(
        UserDataObjectContract $user,
        string $provider,
        string|int $providerID
    ): void {
        $user = User::query()->firstOrCreate(
            attributes: [
                'email' => $user->email,
            ],
            values: $user->toArray()
        );

        $user->oAuthIdentities()->updateOrCreate(
            attributes: [
                'user_id' => $user->id
            ],
            values: [
                'user_id' => $user->id,
                'provider' => $provider,
                'provider_id' => $providerID
            ]
        );

        auth()->loginUsingId($user->id);
    }
}
