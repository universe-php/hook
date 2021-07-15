<?php

namespace Universe\Hook;

use Composer\Composer;
use Composer\Factory;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;
use Composer\EventDispatcher\EventSubscriberInterface;

class Hook implements PluginInterface, EventSubscriberInterface {
    protected $composer;
    protected $io;
    protected $rootDir;

    public function activate(Composer $composer, IOInterface $io)
    {
        $this->composer = $composer;
        $this->io = $io;
        $this->rootDir = dirname(Factory::getComposerFile());
        echo $this->rootDir;
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
        // TODO: Implement deactivate() method.
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
        // TODO: Implement uninstall() method.
    }

    public static function getSubscribedEvents()
    {
        return [
            'post-install-cmd'=>'installOrUpdate',
            'post-update-cmd'=>'installOrUpdate'
        ];
    }

    public function installOrUpdate($event){
        print_r($event);
        file_put_contents($this->rootDir.DIRECTORY_SEPARATOR.'ok.php','abcd');
        echo 'file added';
    }
}