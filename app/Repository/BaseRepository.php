<?php

namespace App\Repository;

abstract class BaseRepository
{
    abstract public function create(array $post);
    abstract public function update($model, array $post);
    abstract public function remove($model);
}
