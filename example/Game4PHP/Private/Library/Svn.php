<?php
namespace ProjMan\Library;

class SVN
{
    public static function getSvnInfo($svn_path)
    {
        exec("svn info $svn_path", $rs);
        return $rs ? implode('<br>', $rs) : '';
    }

    public static function doSvnUp($svn_path, $username, $password)
    {
        ignore_user_abort(true);
        set_time_limit(0);
        $cmd = "export LANG=\"zh_CN.UTF-8\";svn up --username=$username --password=$password $svn_path 2>&1";
        exec($cmd, $rs);
        return $rs ? implode('<br>', $rs) : '';
    }

    public static function doSvnCleanup($svn_path)
    {
        ignore_user_abort(true);
        set_time_limit(0);
        $cmd = "export LANG=\"zh_CN.UTF-8\";svn cleanup $svn_path 2>&1";
        exec($cmd, $rs);
        return $rs ? implode('<br>', $rs) : '';
    }
}