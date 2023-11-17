<?php

namespace App\View;
use Jenssegers\Blade\Blade;

class ViewEngine extends Blade
{
    public function __construct()
    {
        parent::__construct(
            path('views'), path('storage/cache')
        );
    }
}