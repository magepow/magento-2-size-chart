<?php

namespace Magepow\Sizechart\Cron;

class FlushCache
{

    protected $helperCache;

    public function __construct(
        \Magepow\Sizechart\Helper\Cache $helperCache
    )
    {
        $this->helperCache = $helperCache;
    }

    public function flushCache()
    {
        $this->helperCache->flushCache();
    }
}