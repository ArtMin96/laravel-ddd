<?php

declare(strict_types=1);

namespace Domains\OAuth\Factories;

use Domains\OAuth\DataObjects\OAuthIdentityDataObject;
use Infrastructure\OAuth\DataObjects\OAuthIdentityDataObjectContract;
use Infrastructure\OAuth\Factories\OAuthIdentityFactoryContract;

final class OAuthIdentityFactory implements OAuthIdentityFactoryContract
{
    /**
     * @param array<string, mixed> $attributes
     *
     * @return OAuthIdentityDataObjectContract
     */
    public function make(array $attributes): OAuthIdentityDataObjectContract
    {
        return new OAuthIdentityDataObject(
            userID: intval(data_get(target: $attributes, key: 'userID')),
            provider: strval(data_get(target: $attributes, key: 'provider')),
            providerID: data_get(target: $attributes, key: 'providerID')
        );
    }
}
