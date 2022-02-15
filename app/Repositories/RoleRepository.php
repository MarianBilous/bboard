<?php

namespace App\Repositories;

use Spatie\Permission\Models\Role;

/**
 * Class RoleRepository
 *
 * @package App\Repositories
 */
class RoleRepository extends BaseRepository
{
    /**
     * RoleRepository constructor.
     *
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        parent::__construct($model);
    }
}
