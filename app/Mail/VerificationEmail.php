<?php
namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\URL;

class VerificationEmail extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    /**
     * Create a new message instance.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $signedUrl = URL::temporarySignedRoute(
            'email.verify',
            now()->addHours(24),
            ['user' => $this->user->id]
        );

        return $this->view('verification')
            ->with([
                'user' => $this->user,
                'signedUrl' => $signedUrl,
            ]);
    }
}
