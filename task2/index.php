<?php

$connection = new PDO('sqlite:' . __DIR__ . './../identifier.sqlite');

$api_url_comments = 'https://jsonplaceholder.typicode.com/comments?postId=2';
$api_url_posts = 'https://jsonplaceholder.typicode.com/posts';

$json_data_comments = file_get_contents($api_url_comments);
$json_data_posts = file_get_contents($api_url_posts);

$comments = json_decode($json_data_comments);
$posts = json_decode($json_data_posts);


foreach ($comments as $comment) {

    $connection->exec(
        "INSERT INTO comments (post_id, name, email, body) VALUES ($comment->postId, '".$comment->name."', '".$comment->email."', '".$comment->body."')"
    );
}

foreach ($posts as $post) {

    $connection->exec(
        "INSERT INTO posts (user_id, title, body) VALUES ($post->userId, '".$post->title."', '".$post->body."')"
    );
}




