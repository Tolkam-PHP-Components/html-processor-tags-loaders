<?php declare(strict_types=1);

namespace Tolkam\HTMLProcessor\Tags\Loader;

use DI\Container;
use Tolkam\HTMLProcessor\Tags\Handler\TagsHandlerInterface;

class DiContainerLoader implements TagsHandlerLoaderInterface
{
    /**
     * @var Container
     */
    protected Container $container;
    
    /**
     * @param Container $container
     */
    public function __construct(Container $container)
    {
        $this->container = $container;
    }
    /**
     * @inheritDoc
     */
    public function load(string $alias): ?TagsHandlerInterface
    {
        if ($this->container->has($alias)) {
            // makes new instance
            return $this->container->make($alias);
        }
        
        return null;
    }
}
