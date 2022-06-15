<?php

declare(strict_types=1);

namespace Infrastructure\OAuth\Factories;

use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

interface UserFactoryContract
{
    /**
     * @param array<string, mixed> $attributes
     *
     * @return UserDataObjectContract
     */
    public function make(array $attributes): UserDataObjectContract;
}
