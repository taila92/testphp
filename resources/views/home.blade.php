<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>

    <link href="{{ asset('asset/styles.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>
            MAQUE-FORUM
        </h1>
        <p>You curent timezone is: </p>

        <div class="contents">
            <ul>
                @foreach($posts as $post)
                    <li class="post-li">
                        <div class="author-box">
                            <img src="{{ $post['author']['image'] }}" alt="{{ $post['author']['name'] }}">
                            <span class="author-name mt5">{{ $post['author']['name'] }}</span> &nbsp;
                            <span class="mt5 post-on">posted on {{ $post['created_at'] }}</span>
                        </div>
                        <div class="post-box">
                            <div class="post-image">
                                <img src="{{ $post['image'] }}">
                            </div>
                            <div class="post-content">
                                <div class="post-title">
                                    {{ $post['title'] }}
                                </div>
                                <div class="post-description">
                                    {{ $post['description'] }}
                                </div>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

    </div>
</body>
</html>
