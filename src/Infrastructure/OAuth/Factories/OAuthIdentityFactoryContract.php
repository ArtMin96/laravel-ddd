<?php

declare(strict_types=1);

namespace Infrastructure\OAuth\Factories;

use Infrastructure\OAuth\DataObjects\OAuthIdentityDataObjectContract;

interface OAuthIdentityFactoryContract
{
    /**
     * @param array<string, mixed> $attributes
     *
     * @return OAuthIdentityDataObjectContract
     */
    public function make(array $attributes): OAuthIdentityDataObjectContract;
}
