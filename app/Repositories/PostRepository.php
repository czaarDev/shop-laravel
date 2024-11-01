<?php

namespace App\Repositories;

use App\Events\PostCreatedGroup;
use App\Models\Group;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class PostRepository
{
    public function __construct(
        protected Post $entity
    ) {
        $this->entity = $entity;
    }

    private function buildQuery(): Builder
    {
        $query = $this->entity::query();

        $q = request('q');
        if (!empty($q)) {
            $query = $query->where("name", "LIKE", "%{$q}%");
        }

        $id = request('id');
        if (!empty($code)) {
            $query = $query->whereId($id);
        }

        return $query->with(['media']);
    }

    public function all(): Collection
    {
        return $this->buildQuery()
                ->active()
                ->latest()
                ->get();
    }

    public function paginate(int $limit = 15): LengthAwarePaginator
    {
        return $this->buildQuery()
                ->active()
                ->latest()
                ->paginate($limit);
    }

    public function postsForLoggedUser(): LengthAwarePaginator
    {
        return auth()->user()
            ->followersPosts()
            ->with([
                'media',
                'user' => [
                    'media'
                ],
                'reactions',
                'popularComments'
            ])
            ->orderBy('posts.created_at', 'desc')
//            ->orderByDesc(
//                DB::raw('post_reactions_count + (shared_post_count * 3) + (comments_count * 2) + post_comments_reactions_count + (CASE WHEN media_count > 0 THEN 10 ELSE 0 END)')
//            )
            ->paginate();
    }

    public function postsUser(User $user): LengthAwarePaginator
    {
        return $user->posts()
            ->with([
                'images',
                'files',
                'user.media',
                'likes.user',
                'comments.user',
                'comments.likes',
            ])
            ->withCount([
                'comments',
                'likes',
            ])
            ->orderBy('posts.created_at', 'desc')
            ->paginate();
    }

    public function postsGroup(Group $group): LengthAwarePaginator
    {
        return $group->posts()
            ->orderBy('posts.created_at', 'desc')
            ->paginate();
    }

    public function create(mixed $validated): Post
    {
        $post = $this->entity::create($validated);

        if ($validated->input('featured_image', false)) {
            $post->addMedia(storage_path('tmp/uploads/' . basename($validated->input('featured_image'))))->toMediaCollection('featured_image');
        }

        return $post;
    }

    public function createForUser(User $user, mixed $validated)
    {
        $post = $user->posts()->create($validated);

        $group_id = $validated['group_id'] ?? false;
        if ($group_id) {
            $post->groups()->attach($group_id);

            $group = Group::find($group_id);

            event(new PostCreatedGroup($post, $group));
        }

        $images = $validated['image_featured'] ?? [];
        if (count($images)) {
            foreach ($images as $image) {
                $post->addMedia($image)->toMediaCollection('featured_image');
            }
        }

        $files = $validated['files'] ?? [];
        if (count($files)) {
            foreach ($files as $file) {
                $post->addMedia($file)->toMediaCollection('files');
            }
        }

        return $post;
    }

    public function update(Post $post, mixed $validated): Post
    {
        $post->update($validated);

        return $post;
    }

}
