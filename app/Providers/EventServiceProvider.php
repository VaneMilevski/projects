<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    
    protected $listen = [
        \App\Events\ContactFormSubmitted::class => [
            \App\Listeners\SendContactFormAcknowledgement::class,
        ],
    ];

   
    public function boot()
    {
        parent::boot();
    }
}
