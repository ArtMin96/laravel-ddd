<?php

declare(strict_types=1);

namespace Domains\OAuth\DataObjects;

use Infrastructure\OAuth\DataObjects\OAuthIdentityDataObjectContract;

final class OAuthIdentityDataObject implements OAuthIdentityDataObjectContract
{
    /**
     * @param int|null   $userID
     * @param string     $provider
     * @param string|int $providerID
     */
    public function __construct(
        public readonly null|int $userID,
        public readonly string $provider,
        public readonly string|int $providerID,
    ) {}

    /**
     * @return array<string,string|int>
     */
    public function toArray(): array
    {
        return [
            'user_id' => $this->userID,
            'provider' => $this->provider,
            'provider_id' => $this->providerID
        ];
    }
}
