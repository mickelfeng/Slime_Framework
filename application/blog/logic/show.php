<?php
namespace SF\Blog\Logic;

class Show
{
    public static function main()
    {
        //$mysql = \SF\System\Database\Mysql::load();
        \SF\System\Model::initialize();
        $group = \SF\Blog\Article::getGroup();
    }
}
