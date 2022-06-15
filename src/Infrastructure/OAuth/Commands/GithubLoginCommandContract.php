<?php

declare(strict_types=1);

namespace Infrastructure\OAuth\Commands;

use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

interface GithubLoginCommandContract
{
    /**
     * @param UserDataObjectContract $user
     *
     * @return void
     */
    public function handle(UserDataObjectContract $user): void;
}
