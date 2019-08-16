<?php

namespace App\Mail;

use App\Domain;
use App\Endpoint;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SubmissionNotificationMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * @var Domain
     */
    public $domain;

    /**
     * @var Endpoint
     */
    public $endpoint;

    /**
     * An array of submitted form data.
     * @var array
     */
    public $form;


    /**
     * SubmissionNotificationMail constructor.
     * @param Endpoint $endpoint
     * @param Domain $domain
     * @param array $form
     */
    public function __construct(Endpoint $endpoint, Domain $domain, array $form)
    {
        $this->endpoint = $endpoint;
        $this->domain = $domain;
        $this->form = $form;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->attachCCIfNeeded()
            ->from('webmaster@haqqman.com', $this->domain->email_from)
            ->subject($this->domain->email_subject)
            ->view('mails.submission');
    }

    /**
     * Attach a Carbon copy set on domain if it is
     * available (not null).
     */
    protected function attachCCIfNeeded()
    {
        return $this->domain->email_secondary
            ? $this->cc($this->domain->email_secondary)
            : $this;
    }
}
