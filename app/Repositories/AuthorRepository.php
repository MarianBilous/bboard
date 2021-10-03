<?php

namespace App\Repositories;

use App\Models\Author;

/**
 * Class AuthorRepository.
 */
class AuthorRepository extends BaseRepository
{
    /**
     * AuthorRepository constructor.
     *
     * @param Author $model
     */
    public function __construct(Author $model)
    {
        parent::__construct($model);
    }
}
