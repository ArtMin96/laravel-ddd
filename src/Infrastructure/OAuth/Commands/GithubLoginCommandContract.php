<?php

declare(strict_types=1);

namespace Infrastructure\OAuth\Commands;

use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

interface GithubLoginCommandContract
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
    ): void;
}
