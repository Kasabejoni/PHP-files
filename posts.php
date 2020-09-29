<?php
require_once 'database.php';

class Posts
{

    private $db; //Db Class is singeltone so its not really create a new instance Of Db
    public $id;
    public $user_id;
    public $title;
    public $body;
    public $updated_at;
    public $created_at;
    public function __construct($user_id, $title, $body)
    {
        $this->db = new Database();
        $this->title = $title;
        $this->user_id = $user_id;
        $this->body = $body;
    }
    public function create()
    {
        return $this
            ->db
            ->createPost($this->user_id, $this->title, $this->body);

    }
    public static function searchById($post_id)
    {

        $db = new Database();
        $postdata = $db->getpostbyID($post_id);
        $instance1 = new Posts($postdata["user_id"], $postdata["title"], $postdata["body"]);
        $instance1->id = $postdata["id"];
        $instance1->created_at = $postdata["created_at"];
        $instance1->updated_at = $postdata["updated_at"];
        return $instance1;
    }
    public static function searchByUserId($user_id)
    {

        $db = new Database();
        $user_posts = [];
        $user_posts1 = [];
        $user_posts = $db->getPostByUserId($user_id);
        foreach ($user_posts as $up)
        {
            $instance1 = new Posts($up["user_id"], $up["title"], $up["body"]);
            $instance1->id = $up["id"];
            $instance1->created_at = $up["created_at"];
            $instance1->updated_at = $up["updated_at"];
            $user_posts1[] = $instance1;
        }
        return $user_posts1;
    }
    public static function searchByContent($string)
    {

        $db = new Database();
        $user_posts = [];
        $user_posts1 = [];
        $user_posts = $db->searchByContent($string);
        foreach ($user_posts as $up)
        {
            $instance1 = new Posts($up["user_id"], $up["title"], $up["body"]);
            $instance1->id = $up["id"];
            $instance1->created_at = $up["created_at"];
            $instance1->updated_at = $up["updated_at"];
            $user_posts1[] = $instance1;
        }
        return $user_posts1;
    }
}
//$test=Posts::searchById(1);
//var_dump($test);
//$test1=Posts::searchByUserId(11);
//var_dump($test1);
//$test2=Posts::searchByContent("as");
//var_dump($test2);
//$test3=new Posts(11,"title","body");
//$test3->Create();
?>
