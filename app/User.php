<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\ResetPasswordNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function questions()
    {
        return $this->belongsTo('App\Question', 'user_id', 'id');
    }

     /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new Notifications\VerifyEmail);
    }

    /**
     * This method is of class Illuminate\Auth\Passwords\CanResetPassword
     * to override the default Laravel email template, the steps were:
     * 1 - command line = "php artisan make:notification MyResetClass"
     *
     * This will create the new class in the app / Notifications directory.
     * Change the constructor of the generated file to:
     * 2 - Change the __construct () of the generated file to: "$ this-> token = $ token"
     *
     * Add the following import to the user template (probably in app / User.php):
     * 3 - use App \ Notifications \ MyResetClass;
     *
     * Add this new method to the user template:
     * 4 - public function sendPasswordResetNotification ($ token)
     *     {
     *          $ this-> notify (new myResetDeSenha ($ token));
     *     }
     *
     * Turn the following artisan command to publish the changes:
     * 5 - php artisan vendor: publish --tag = laravel-notifications
     *
     * After you run this command, the notification mail template will be located
     * in the resources / views / vendor / notifications directory.
     *
     * Edit the inline and action text of the toMail () method in your MyResetClass class:
     * 6 - public function toMail ($ notifiable)
     *     {
     *         return (new MailMessage)
     *             -> subject ('Email Subject')
     *             -> greeting ('Hello!')
     *             -> line ('You are receiving this email because we have received a request for your account.')
     *             -> action ('RESET PASSWORD', route ('password.reset', $ this-> token))
     *             -> line ('If you have requested a password reset, no action is necessary.')
     *             -> markdown ('vendor.notifications.email');
     *     }
     *
     * Edit the email text in resources / views / vendor / notifications / email.blade.php if you want
    */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
