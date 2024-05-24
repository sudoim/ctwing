<?php

namespace Sudoim\CTWing\Kernel\Traits;

use Psr\Cache\CacheItemPoolInterface;
use Psr\SimpleCache\CacheInterface;
use Sudoim\CTWing\Kernel\Exceptions\InvalidArgumentException;
use Sudoim\CTWing\Kernel\ServiceContainer;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Psr16Cache;
use Symfony\Component\Cache\Simple\FilesystemCache;

trait InteractsWithCache
{
    protected CacheInterface|null $cache = null;

    /**
     * @throws InvalidArgumentException
     */
    public function getCache()
    {
        if ($this->cache) {
            return $this->cache;
        }

        if (property_exists($this, 'app') && $this->app instanceof ServiceContainer && isset($this->app['cache'])) {
            $this->setCache($this->app['cache']);

            assert($this->cache instanceof CacheInterface);

            return $this->cache;
        }

        return $this->cache = $this->createDefaultCache();
    }

    /**
     * @throws InvalidArgumentException
     */
    public function setCache(CacheInterface|CacheItemPoolInterface $cache): self
    {
        if (empty(array_intersect([CacheInterface::class, CacheItemPoolInterface::class], class_implements($cache)))) {
            throw new InvalidArgumentException(sprintf('The cache instance must implement "%s" or "%s" interface.', CacheInterface::class, CacheItemPoolInterface::class));
        }

        if ($cache instanceof CacheItemPoolInterface) {
            if (!$this->isSymfony43OrHigher()) {
                throw new InvalidArgumentException(sprintf('The cache instance must implements %s', CacheInterface::class));
            }

            $cache = new Psr16Cache($cache);
        }

        $this->cache = $cache;

        return $this;
    }

    protected function createDefaultCache(): CacheInterface
    {
        if ($this->isSymfony43OrHigher()) {
            return new Psr16Cache(new FilesystemAdapter('ctWing', 1500));
        }

        return new FilesystemCache();
    }

    protected function isSymfony43OrHigher(): bool
    {
        return class_exists('Symfony\Component\Cache\Psr16Cache');
    }
}