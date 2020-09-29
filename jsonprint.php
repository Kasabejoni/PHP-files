<?php
require_once 'posts.php'; //to use the methods of posts
if(isset($_GET['user_id']))
{
$temp=Posts::searchByUserId($_GET['user_id']);
echo json_encode($temp);
}
else if(isset($_GET['post_id']))
{
	
	$temp=Posts::searchById($_GET['post_id']);
echo json_encode($temp);
}
else
	print "Nothing To Show, Please set user_id/post_id";
?>
