<?php //Db Class - Singelton
class Database
{
    public static $conn;

    public function __construct()
    {
        self::connect();
    }

    public static function connect()
    { //connect to database -Singelton If the Connection already intialized it return the same instance.
        if (self::$conn)
        {
            return self::$conn;
        }

        $servername = "localhost";
        $username = "root";
        $password = "";

        $conn = new mysqli($servername, $username, $password, 'jtest1');

        self::$conn = $conn;
        return $conn;
    }

    public function query($query)
    {
        $result = mysqli_query(self::$conn, $query);
        if (!$result)
        {
            return [];
        }

        $array = array();

        if (mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_assoc($result))
            {
                $array[] = $row;
            }
        }
        return $array;
    }
    public function createUser($name, $mail)
    { //Insert User into Db
        return mysqli_query(self::$conn, "INSERT INTO users (email, name) VALUES ('$mail','$name')");
    }
    public function createPost($user_id, $title, $body)
    { //Insert Post Into Db
        return mysqli_query(self::$conn, "INSERT INTO posts (user_id,title,body) VALUES ('$user_id','$title','$body')");
    }
    public function getPostById($id)
    {
        $query = "SELECT * FROM posts where id=" . $id;
        return $this->query($query) [0];
    }
    public function getPostByUserId($user_id)
    {
        $query = "SELECT * FROM posts where user_id=" . $user_id;
        return $this->query($query);
    }
    public function getUserBymail($mail)
    {
        $is_item_exist = $this->query("Select * from users where email='$mail' limit 1");
        if (sizeof($is_item_exist) > 0)
        {
            return $is_item_exist[0]['id'];
        }
    }
    public function searchByContent($string)
    {
        return $this->query("Select * from posts where title LIKE \"%$string%\" or body like \"%$string%\"");
    }
}
?>
