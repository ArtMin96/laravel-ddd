<?php

declare(strict_types=1);

namespace Domains\OAuth\Providers;

use Domains\OAuth\Commands\GithubLoginCommand;
use Domains\OAuth\DataObjects\OAuthIdentityDataObject;
use Domains\OAuth\DataObjects\UserDataObject;
use Domains\OAuth\Factories\OAuthIdentityFactory;
use Domains\OAuth\Factories\UserFactory;
use Illuminate\Support\ServiceProvider;
use Infrastructure\OAuth\Commands\GithubLoginCommandContract;
use Infrastructure\OAuth\DataObjects\OAuthIdentityDataObjectContract;
use Infrastructure\OAuth\DataObjects\UserDataObjectContract;
use Infrastructure\OAuth\Factories\OAuthIdentityFactoryContract;
use Infrastructure\OAuth\Factories\UserFactoryContract;

class OAuthServiceProvider extends ServiceProvider
{
    /**
     * @var array<class-string, class-string>
     */
    public array $bindings = [
        UserDataObjectContract::class => UserDataObject::class,
        UserFactoryContract::class => UserFactory::class,
        OAuthIdentityDataObjectContract::class => OAuthIdentityDataObject::class,
        OAuthIdentityFactoryContract::class => OAuthIdentityFactory::class,
        GithubLoginCommandContract::class => GithubLoginCommand::class,
    ];

    /**
     * @return void
     */
    public function boot(): void
    {
        $this->loadRoutesFrom(
            path: __DIR__ . './../routes.php'
        );
    }
}
