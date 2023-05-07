<?php

namespace App\Models;

use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Author extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the books for the Author
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function books(): HasMany
    {
        return $this->hasMany(Book::class);
    }

    /**
     * function authorList
     *
     * @param ?array $select
     * @return ?\Illuminate\Database\Eloquent\Collection
     */
    public static function authorList(?array $select = \null): ?Collection
    {
        $select = \array_filter(
            ($select ?? []),
            fn ($item) => \in_array(
                $item,
                [
                    'id',
                    'name',
                    'created_at',
                    'updated_at',
                ],
                true
            )
        );

        $select = $select ?? ['id', 'name'];

        $cacheKey = "authors_list_select-" . \implode('-', \array_values($select));

        return Cache::remember(
            $cacheKey,
            120,
            fn () => Author::select('id', 'name')->get()
        );
    }
}
