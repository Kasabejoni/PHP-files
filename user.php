<?php
require_once 'database.php';

class User
{

    private $db; //Db Class is singeltone so its not really create a new instance Of Db
    private $name;
    private $email;
    private $id;
    private $updated_at;
    private $created_at;
    public function __construct($name, $email) // id=AI AND The Dates Are From The sql(created=default time at insert,updated=a triiger after update)
    {
        $this->db = new Database();
        $this->name = $name;
        $this->email = $email;
    }
    public function create()
    {
        return $this
            ->db
            ->createUser($this->name, $this->email);

    }
    public function getuserid() //Get userID By Mail.
    {
        return $this
            ->db
            ->getUserBymail($this->email);

    }

}

?>
