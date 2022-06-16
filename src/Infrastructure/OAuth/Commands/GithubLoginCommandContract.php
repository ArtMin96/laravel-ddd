<?php

declare(strict_types=1);

namespace Infrastructure\OAuth\Commands;

use Infrastructure\OAuth\DataObjects\OAuthIdentityDataObjectContract;
use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

interface GithubLoginCommandContract
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
    ): void;
}
