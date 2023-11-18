<?php

namespace Core\Database;


use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;


class DatabaseConnection
{
    public Capsule $engine ;

    public function __construct()
    {
        $capsule = new Capsule;

        $capsule->addConnection([
            'driver'    => 'sqlite',
            'database'  => path('database/sqlite.db'), 
            'charset'   => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix'    => '',
        ]);

        $capsule->setEventDispatcher(new Dispatcher(new Container));
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
        $this->engine = $capsule;
    }
}