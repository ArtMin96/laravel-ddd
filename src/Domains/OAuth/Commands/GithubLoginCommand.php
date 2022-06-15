<?php

namespace Domains\OAuth\Commands;

use Domains\OAuth\Models\User;
use Infrastructure\OAuth\Commands\GithubLoginCommandContract;
use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

class GithubLoginCommand implements GithubLoginCommandContract
{
    /**
     * @param UserDataObjectContract $user
     *
     * @return void
     */
    public function handle(UserDataObjectContract $user): void
    {
        $user = User::query()->firstOrCreate(
            attributes: [
                'provider' => $user->provider,
                'provider_id' => $user->providerID,
            ],
            values: $user->toArray()
        );

        auth()->loginUsingId($user->id);
    }
}
