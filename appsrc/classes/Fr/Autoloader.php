<?php
namespace Fr;

class Autoloader
{
    
    protected $namespaces = [
    ];
    
    public function __construct()
    {
    }
    
    public function register()
    {
        return spl_autoload_register([$this, "load"]);
    }
    
    public function addNamespace($nsPrefix, $nsClassPath)
    {
        $this->namespaces[$nsPrefix] = $nsClassPath;
        return $this;
    }
    
    public function load($className) 
    {
        $classPathBase = FR_SRCPATH . "/classes";
        foreach ($this->namespaces as $nsPrefix => $nsClassPath) {
            if (0 === strpos($className, $nsPrefix)) {
                $classPathBase = $nsClassPath;
                break;
            }
        }
        $className = str_replace('\\', DIRECTORY_SEPARATOR, $className);
        $classPath = ($classPathBase ? $classPathBase . DIRECTORY_SEPARATOR : "") . $className . '.php';
        $ok = include $classPath;
        return $ok;
    }
    
}