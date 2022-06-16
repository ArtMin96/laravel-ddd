<?php

namespace Domains\OAuth\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Snowflake\SnowflakeCast;
use Snowflake\Snowflakes;

/**
 * Domains\OAuth\Models\OAuthIdentities
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $provider
 * @property string $provider_id
 * @property string $created_at
 * @property string $updated_at
 * @property User $user
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities query()
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities whereProvider($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities whereProviderId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|OAuthIdentities whereUserId($value)
 * @mixin \Eloquent
 */
class OAuthIdentities extends Model
{
    use Snowflakes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'oauth_identities';

    /**
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'provider',
        'provider_id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'id' => SnowflakeCast::class,
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
