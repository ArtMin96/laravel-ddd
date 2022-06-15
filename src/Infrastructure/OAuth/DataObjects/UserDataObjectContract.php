<?php

declare(strict_types=1);

namespace Infrastructure\OAuth\DataObjects;

interface UserDataObjectContract
{
    /**
     * @return array<string,string|int>
     */
    public function toArray(): array;
}
