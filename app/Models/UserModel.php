<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int id
 * @property string name
 * @property \DateTimeInterface created_at
 * @property \DateTimeInterface updated_at
 */
class UserModel extends Model
{
    public const TABLE_NAME = 'users';

    /**
     * @inheritDoc
     */
    protected $fillable = ['name'];

    /**
     * @inheritDoc
     */
    protected $casts = [
        'created_at' => 'datetime:'.\DateTimeInterface::ISO8601,
        'updated_at' => 'datetime:'.\DateTimeInterface::ISO8601,
    ];

    /**
     * @inheritDoc
     */
    public function getTable(): string
    {
        return self::TABLE_NAME;
    }

    /**
     * @return HasMany
     */
    public function orders(): HasMany
    {
        return $this->hasMany(OrderModel::class);
    }
}
