<?php

namespace Domains\OAuth\Commands;

use Domains\OAuth\Models\User;
use Illuminate\Support\Facades\DB;
use Infrastructure\OAuth\Commands\GithubLoginCommandContract;
use Infrastructure\OAuth\DataObjects\OAuthIdentityDataObjectContract;
use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

class GithubLoginCommand implements GithubLoginCommandContract
{
    /**
     * @param UserDataObjectContract          $user
     * @param OAuthIdentityDataObjectContract $OAuthIdentity
     *
     * @return void
     */
    public function handle(
        UserDataObjectContract $user,
        OAuthIdentityDataObjectContract $OAuthIdentity
    ): void {
        try {
            DB::transaction(function () use ($user, $OAuthIdentity) {
                $user = User::query()->firstOrCreate(
                    attributes: [
                        'email' => $user->email,
                    ],
                    values: $user->toArray()
                );

                $user->oAuthIdentities()->updateOrCreate(
                    attributes: [
                        'user_id' => $user->id,
                        'provider' => $OAuthIdentity->provider
                    ],
                    values: array_merge(
                        $OAuthIdentity->toArray(),
                        ['user_id' => $user->id]
                    )
                );

                auth()->loginUsingId($user->id);
            });
        } catch (\Throwable $e) {
            // Handling error
        }
    }
}
