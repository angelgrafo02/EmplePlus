<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        VerifyEmail::toMailUsing(function($notifiable, $url){
            return (new MailMessage)
                ->greeting('¡Hola EmplePlusero!')
                ->line('Bienvenido a nuestra plataforma.')
                ->subject('Verificar Cuenta')
                ->line('Presiona el siguiente enlace para poder entrar en el mundo laboral con EmplePlus.')
                ->action('Confirmar cuenta', $url)
                ->line('Si no intentaste crear una cuenta en EmplePlus, ignora este mensaje.')
                ->salutation('Gracias.');
        });
    }
}
