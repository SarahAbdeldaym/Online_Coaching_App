<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AdminResetPassword extends Mailable {
    use Queueable, SerializesModels;
    protected $data = [];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data = []) {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build() {
        return $this
            ->from('captainy@captainy.com', 'Captainy')
            ->subject('Captainy Password Reset')
            ->markdown('admin.emails.admin_reset_password')
            ->with('data', $this->data);
    }
}
