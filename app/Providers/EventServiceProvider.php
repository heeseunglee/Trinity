<?php namespace App\Providers;

use App\User;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

		// fire creating event for users
        // this event will generate password for 10 characters long string
        // and send a mail to the user
        // but for the initial settings, some consultants will be ignored
        User::created(function($user) {
            if($user->userable_type == 'App\Consultant' && !$user->userable->is_admin)
                return false;

            $pw = $this->generate_password();

            // Password is stored in `$pw`
            \DB::transaction(function() use ($pw, $user) {
                $user->password = \Hash::make($pw);
                $user->save();
            });

            \Mail::queue('emails.userCreated', ['user' => $user, 'password' => $pw], function($message) use ($user) {
                $message->to($user->email, $user->name_kor);
            });
        });
	}

    private function generate_password($length = 10, $complex = 4) {
        $min = 'abcdefghijklmnopqrstuvwxyz';
        $num = '0123456789';
        $maj = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symb = '!@#$%^&*()_-=+;:,.?';
        $chars = $min;
        if ($complex >= 2) { $chars .= $num; }
        if ($complex >= 3) { $chars .= $maj; }
        if ($complex >= 4) { $chars .= $symb; }
        $password = substr( str_shuffle( $chars ), 0, $length );
        return $password;
    }

}
