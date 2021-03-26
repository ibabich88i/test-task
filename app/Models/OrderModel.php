<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int id
 * @property int user_id
 * @property int line
 * @property string row
 * @property string aircraft_type
 * @property \DateTimeInterface created_at
 * @property \DateTimeInterface updated_at
 */
class OrderModel extends Model
{
    public const TABLE_NAME = 'orders';

    /**
     * @inheritDoc
     */
    protected $fillable = ['user_id', 'line', 'row', 'aircraft_type'];

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
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(UserModel::class);
    }
}
