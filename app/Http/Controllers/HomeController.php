<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index() {
        $path_posts = storage_path() . "/filedata/posts.json";

        $posts = json_decode(file_get_contents($path_posts), true);

        $path_authors = storage_path() . "/filedata/authors.json";
        $authors = json_decode(file_get_contents($path_authors), true);

        $posts_last = array();
        foreach ($posts['posts'] as $post) {
            foreach ($authors['authors'] as $author) {
                if($author['id'] == $post['author_id']) {
                    $post['author'] = $author;
                }
            }

            $post['created_at'] = date('D, M j, Y, G:i', strtotime($post['created_at']));
            $posts_last[] = $post;
        }

        return view('home')->with('posts', $posts_last);
    }
}
