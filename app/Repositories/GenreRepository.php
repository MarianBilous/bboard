<?php

namespace App\Repositories;

use App\Models\Genre;

/**
 * Class GenreRepository
 *
 * @package App\Repositories
 */
class GenreRepository extends BaseRepository
{
    /**
     * GenreRepository constructor.
     *
     * @param Genre $model
     */
    public function __construct(Genre $model)
    {
        parent::__construct($model);
    }
}
