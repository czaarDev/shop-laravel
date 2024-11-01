<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\{ContentCategory, ContentPage, Post};
use App\Repositories\PostRepository;
use Illuminate\View\View;

class ContentController extends Controller
{

    public function __construct(
        public PostRepository $postRepository,
    ) { }

    public function posts(): View
    {
        return view('site.content.posts', [
            'title' => "Últimas Postagens",
            'description' => "Últimas Postagens - " . config('app.name'),
            'posts' => $this->postRepository->paginate(),
        ]);
    }

    public function post(Post $post): View
    {
        return view('site.content.post', [
            'title' => $post->title,
            'description' => $post->subtitle,
            'post' => $post,
        ]);
    }

    public function page(ContentCategory $category, ContentPage $page): View
    {
        return view('site.content.page', [
            'title' => $page->title,
            'description' => $page->excerpt,
            'page' => $page,
        ]);
    }

}
