<?php

declare(strict_types=1);

namespace Domains\OAuth\DataObjects;

use Infrastructure\OAuth\DataObjects\UserDataObjectContract;

final class UserDataObject implements UserDataObjectContract
{
    /**
     * @param string $firstName
     * @param string $lastName
     * @param string $username
     * @param string $avatar
     * @param string $email
     * @param string $password
     */
    public function __construct(
        public readonly string $firstName,
        public readonly string $lastName,
        public readonly string $username,
        public readonly string $avatar,
        public readonly string $email,
        public readonly string $password,
    ) {}

    /**
     * @return array<string,string|int>
     */
    public function toArray(): array
    {
        return [
            'first_name' => $this->firstName,
            'last_name' => $this->lastName,
            'username' => $this->username,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'password' => $this->password,
        ];
    }
}
