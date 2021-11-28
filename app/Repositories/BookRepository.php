<?php

namespace App\Repositories;

use App\Models\Book;

/**
 * Class BookRepository
 *
 * @package App\Repositories
 */
class BookRepository extends BaseRepository
{
    /**
     * BookRepository constructor.
     *
     * @param Book $model
     */
    public function __construct(Book $model)
    {
        parent::__construct($model);
    }
}
