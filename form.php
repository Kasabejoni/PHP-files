<?php
require_once 'posts.php'; //To Create the Post Obj
require_once 'user.php'; //To Create the User Obj
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $name = $_POST['user_name'];
    $mail = $_POST['user_email'];
    $title = $_POST['post_title'];
    $body = $_POST['post_body'];
    $tempuser = new User($name, $mail); //Create A temp User Obj
    $bool = $tempuser->Create(); // Adding the user into the Db and the result. 1=the Obj inserted 0=Problem With The insert
    $user_id = $tempuser->getuserid(); // Get The User Id To use for the post Obj.
    $temppost = new posts($user_id, $title, $body);
    $bool1 = $temppost->Create(); // Adding the Post into the Db and the result. 1=the Obj inserted 0=Problem With The insert
    if ($bool * $bool1 == 1) // If true that means that the 2 Obj above Inserted
    print "Data Inserted";
    else print "Error Is Ocurred";

}

?>
