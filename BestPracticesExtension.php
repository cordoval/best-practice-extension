<?php

namespace Cordoval\BestPractices\PhpSpec;

use PhpSpec\Extension\ExtensionInterface;
use PhpSpec\ServiceContainer;

class BestPracticesExtension implements ExtensionInterface
{
    /**
     * @param ServiceContainer $container
     */
    public function load(ServiceContainer $container)
    {
        $container->setShared('code_generator.generators.specification', function (ServiceContainer $c) {
            return new ClassNotationSpecificationGenerator(
                $c->get('console.io'),
                $c->get('code_generator.templates')
            );
        });

        $container->setParam('code_generator.templates.paths', array(
            rtrim(__DIR__, DIRECTORY_SEPARATOR).DIRECTORY_SEPARATOR.'.phpspec',
        ));
    }
}
