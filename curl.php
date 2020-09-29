<?php
require_once 'user.php';
require_once 'posts.php';
function get_data($url)
{
    $ch = curl_init(); // That Is For Curl
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $data = curl_exec($ch);
    curl_close($ch);
    return $data;
}
//Get The users && Create Objects && Insert into the Db
$url = "https://jsonplaceholder.typicode.com/users"; // Pass Your json Url
$data = get_data($url);
$data = json_decode($data, true); //converts in array
foreach ($data as $user)
{ //foreach element in $arr
    $usertest = new User($user['name'], $user['email']);
    $usertest->create();
}
//Get The Posts && Create Objects && Insert into the Db
$url1 = "https://jsonplaceholder.typicode.com/posts";
$data1 = get_data($url1);
$data1 = json_decode($data1, true); //converts in array
foreach ($data1 as $post)
{ //foreach element in $arr
    $newpost = new Posts($post['userId'], $post['title'], $post['body']);
    $newpost->create();
}
print "Data Inserted Into Db";
?>
