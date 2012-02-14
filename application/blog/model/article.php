<?php
namespace SF\Example\Model;

class Article extends \SF\System\Model
{
    public $id;
    public $title;
    public $user;
    public $content;
    public $create_time;
    public $modified_time;

    public static function getGroup()
    {
        ;
    }
}
