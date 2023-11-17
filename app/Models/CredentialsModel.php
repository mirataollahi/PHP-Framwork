<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

class CredentialsModel extends Model
{
    protected $table = 'credentials';

    /**
     * The name of the "updated at" column.
     *
     * @var string
     */
    const UPDATED_AT = null;


    const CREATED_AT = null;


    protected $fillable = [
        'name' ,
        'ip' ,
        'port' ,
        'username' ,
        'password' ,
        'deleted_at' ,
        'updated_at' ,
        'created_at' ,
    ];

    protected static function booted(): void
    {
        static::addGlobalScope(function ($query) {
            $query->whereNull('deleted_at');
        });
    }


}