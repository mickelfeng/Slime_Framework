<?php
namespace SF\Blog\Model;

class Article extends \SF\System\Model
{
    public $id;
    public $title;
    public $user_id;
    public $content;
    public $create_time;
    public $modified_time;

    protected static $_forignKey = 'article_id';
    protected static $_beloneTo = array('User');
}
