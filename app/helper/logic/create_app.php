<?php
namespace SF\Helper\Logic;

use \SF\System as Sys;

class Create_APP extends Sys\App\CLI_Controller
{
    public function run()
    {
        // get current apps
        $route = Sys\Route::createInstance(new Sys\Cli\Input('')); //@todo
        $data = $route->appExecute();

        $appName = $this->_params['app'];
        if (isset($data[$appName]))
        {
            throw new \RuntimeException(sprintf("App %s has been exist:[%s]\n", $appName, $data[$appName]));
        }
        $appPath = $data[$appName];

        $this->_mkdir($appPath);
        $this->_mkdir($appPath . DIRECTORY_SEPARATOR . 'config');
        $this->_touch($appPath . DIRECTORY_SEPARATOR . 'init.php', $this->_initFile($appName));
    }

    protected function _mkdir($path)
    {
        if (!mkdir($path))
        {
            throw new \RuntimeException(sprintf("Create dir failed:[%s]\n", $path));
        }
        $this->log(sprintf("Create dir successful:[%s]", $path));
        return true;
    }

    protected function _touch($file, $str)
    {
        if (!touch($file))
        {
            throw new \RuntimeException(sprintf("Touch file failed:[%s]\n", $file));
        }
        if (!file_put_contents($file, $str))
        {
            throw new \RuntimeException(sprintf("Write file failed:[%s]\n", $file));
        }
        $this->log(sprintf("Touch and write file successful:[%s]", $file));
        return true;
    }

    protected function _initFile($appName)
    {
        $str = <<<INIT
<?php
namespace SF\{$appName};
use \SF\System as Sys;

class Init
{
    public static function main(Sys\Route \$route)
    {
        return \$route->appExecute();
    }
}
INIT;
        return $str;
    }

    protected function _mainConfFile()
    {
        $str = <<<MAINCONF
<?php
return array(
    'route'  => include('config' . DIRECTORY_SEPARATOR . 'route.conf.php'),
    'module' => include('config' . DIRECTORY_SEPARATOR . 'module.conf.php'),
);
MAINCONF;
        return $str;
    }
}