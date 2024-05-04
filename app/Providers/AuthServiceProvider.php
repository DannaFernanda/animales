<?php

namespace App\Providers; // Asegúrate de agregar el namespace correcto

use App\Models\Animale;
use App\Policies\AnimalePolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider; // Agrega la referencia a la clase ServiceProvider

class AuthServiceProvider extends ServiceProvider
{
    // ...

    protected $policies = [
        Animale::class => AnimalePolicy::class,
    ];

    // ...
}
