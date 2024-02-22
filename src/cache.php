<?php

namespace Caneslarry\PhpHelpers;

class Cache
{
    private array $cache = [];

    public function set(string $key, mixed $value, int $ttl = 60): void
    {
        $expirationTime = time() + $ttl;
        $this->cache[$key] = ['value' => $value, 'expiration' => $expirationTime];
    }

    public function get(string $key): mixed
    {
        if ($this->has($key)) {
            return $this->cache[$key]['value'];
        }

        return null;
    }

    public function has(string $key): bool
    {
        if (isset($this->cache[$key])) {
            $expiration = $this->cache[$key]['expiration'];

            if ($expiration === 0 || $expiration > time()) {
                return true;
            }

            // If the cached item has expired, remove it from the cache
            unset($this->cache[$key]);
        }

        return false;
    }

    public function remove(string $key): void
    {
        unset($this->cache[$key]);
    }

    public function clear(): void
    {
        $this->cache = [];
    }
}