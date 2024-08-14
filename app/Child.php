<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

trait Child
{
    public static function boot(){
        parent::boot();

        static::creating(function ($model){
            $model -> forceFill(['type' => static::class]);
        });
    }

    public static function booted(){
        static::addGlobalScope(static::class, function($builder){
            $builder -> where('type', static::class);
        });
    }
}
