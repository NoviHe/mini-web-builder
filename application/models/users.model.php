<?php
class UsersModel extends Model
{
    public function __construct()
    {
        $this->connect();
        $this->_table = "users";
    }

    public function selectWhereId($id)
    {
        $query = $this->selectWhere(array('id_user' => $id));
        return $this->getResult($query);
    }

    public function selectWhereCol($data = array())
    {
        $query = $this->selectWhere($data);
        return $this->getResult($query);
    }
}
