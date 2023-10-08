<?php
class UsersModel extends Model
{
    public function __construct()
    {
        $this->connect();
        $this->_table = "users";
    }
}
