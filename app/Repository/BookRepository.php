<?php

namespace App\Repository;

use App\Models\Book;

class BookRepository extends BaseRepository
{
    public function create($post)
    {
        return Book::create([
            'name' => data_get($post, 'name'),
            'author' => data_get($post, 'author'),
            'category_id' => data_get($post, 'category'),
            'is_available' => 1
        ]);
    }

    public function update($model_id, $post)
    {
        return Book::where('id', $model_id)->update([
            'name' => data_get($post, 'name'),
            'author' => data_get($post, 'author'),
            'category_id' => data_get($post, 'category'),
            'is_available' => 1
        ]);
    }

    public function remove($model_id)
    {
        return Book::where('id', $model_id)->delete();
    }
}
