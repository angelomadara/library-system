<?php

namespace App\Repository;

use App\Models\Book;

class BookRepository
{
    public function create(array $post)
    {
        return Book::create([
            'name' => data_get($post, 'name'),
            'author' => data_get($post, 'author'),
            'category_id' => data_get($post, 'category'),
            'is_available' => 1
        ]);
    }

    public function update()
    {
    }

    public function remove()
    {
    }
}
