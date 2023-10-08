<?php
class Page_builderModel extends Model
{
    public function __construct()
    {
        $this->connect();
        $this->_table = "page_builder";
    }
}
