<?php

declare(strict_types=1);

namespace Domains\OAuth\Factories;

use Domains\OAuth\DataObjects\UserDataObject;
use Infrastructure\OAuth\DataObjects\UserDataObjectContract;
use Infrastructure\OAuth\Factories\UserFactoryContract;

final class UserFactory implements UserFactoryContract
{
    /**
     * @param array<string, mixed> $attributes
     *
     * @return UserDataObjectContract
     */
    public function make(array $attributes): UserDataObjectContract
    {
        return new UserDataObject(
            firstName: strval(data_get(target: $attributes, key: 'firstName')),
            lastName: strval(data_get(target: $attributes, key: 'lastName')),
            username: strval(data_get(target: $attributes, key: 'username')),
            avatar: strval(data_get(target: $attributes, key: 'avatar')),
            email: strval(data_get(target: $attributes, key: 'email')),
            password: strval(data_get(target: $attributes, key: 'password')),
        );
    }
}
