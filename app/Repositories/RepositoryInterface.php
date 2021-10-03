<?php

namespace App\Repositories;

interface RepositoryInterface
{
    public function getById($id);

    public function all();

    public function delete($id);

    public function create(array $attributes);

    public function update(array $attributes, $id);
}
