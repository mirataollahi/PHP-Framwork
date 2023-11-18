<?php

namespace Core\Contract;

interface ServiceProviderInterface
{
    public function boot(): void;
}