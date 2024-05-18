<?php

namespace App\Repositories;

use App\Interfaces\PostRepositoryInterface;
use App\Models\Post;

class PostRepository implements PostRepositoryInterface
{

    public function all()
    {
        return Post::paginate(10);
    }
    /**
     *
     * @param array $data
     */
    public function create(array $data)
    {
        return Post::create($data);
    }

    /**
     *
     * @param mixed $id
     */
    public function delete($id)
    {
        $this->find($id);
        return Post::destroy($id);
    }

    /**
     *
     * @param mixed $id
     */
    public function find($id)
    {
        return Post::findOrFail($id);
    }

    /**
     *
     * @param array $data
     * @param mixed $id
     */
    public function update(array $data, $id)
    {
        $post = $this->find($id);
        $post->update($data);
        return $post;
    }
}
