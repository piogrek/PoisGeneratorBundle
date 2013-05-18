<?php

namespace Pois\GeneratorBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\Console\Application;
use Sensio\Bundle\GeneratorBundle\Generator\DoctrineCrudGenerator;
use Symfony\Component\Filesystem\FileSystem;


class PoisGeneratorBundle extends Bundle
{

    public function registerCommands(Application $application){
        $crudCommand = $application->get('generate:doctrine:crud');
        $generator = new DoctrineCrudGenerator(new FileSystem, __DIR__.'/Resources/skeleton');
  #      $generator->setSkeletonDirs(__DIR__.'/Resources/skeleton');
        $crudCommand->setGenerator($generator);

    	parent::registerCommands($application);
    }

}

