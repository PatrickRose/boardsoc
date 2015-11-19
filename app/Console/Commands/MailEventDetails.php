<?php namespace BoardSoc\Console\Commands;

use BoardSoc\Event;
use BoardSoc\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Mail\Mailer;
use Illuminate\Mail\Message;

class MailEventDetails extends Command
{

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'cron:events';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email all users about the next event';
    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        parent::__construct();
        $this->mailer = $mailer;
    }

    /**
     * Execute the console command
     *
     * @return mixed
     */
    public function fire()
    {
        $date = Carbon::today()->addDays(3);

        $this->info('Looking for events between ' . Carbon::today()->toFormattedDateString() . ' and ' . $date->toFormattedDateString());

        $users = User::all(['email', 'name']);

        $events = Event::where('date', '>', Carbon::today())->where('date', '<', $date)->orderBy('date', 'ASC')->get();

        if ($events->count() == 0)
        {
            $this->info('No events to send a message about');
            return;
        }

        foreach($users as $user) {
            $email = $user->email;
            $this->mailer->send(
                'mail/events',
                compact('events', 'user'),
                function (Message $message) use($email) {
                    $message->to($email)
                        ->subject('Upcoming events!');
                }
            );
        }

        $this->info(sprintf('Sent a message about %d events to %d users', $events->count(), $users->count()));
    }

}
