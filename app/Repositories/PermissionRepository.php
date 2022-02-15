<?php

namespace App\Repositories;

use Spatie\Permission\Models\Permission;

/**
 * Class PermissionRepository
 *
 * @package App\Repositories
 */
class PermissionRepository extends BaseRepository
{
    /**
     * PermissionRepository constructor.
     *
     * @param Permission $model
     */
    public function __construct(Permission $model)
    {
        parent::__construct($model);
    }
}
