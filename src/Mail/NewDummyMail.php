<?php

namespace InetStudio\Dummies\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use InetStudio\Dummies\Contracts\Mail\NewDummyMailContract;
use InetStudio\Dummies\Contracts\Models\DummyModelContract;

/**
 * Class NewDummyMail.
 */
class NewDummyMail extends Mailable implements NewDummyMailContract
{
    use SerializesModels;

    protected $dummy;

    /**
     * NewDummyMail constructor.
     *
     * @param DummyModelContract $dummy
     */
    public function __construct(DummyModelContract $dummy)
    {
        $this->dummy = $dummy;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): self
    {
        $subject = config('app.name').' | '.((config('dummies.mails.subject')) ? config('dummies.mails.subject') : 'Новый dummy');
        $headers = (config('dummies.mails.headers')) ? config('dummies.mails.headers') : [];

        return $this->from(config('mail.from.address'), config('mail.from.name'))
            ->to(config('dummies.mails.to'), '')
            ->subject($subject)
            ->withSwiftMessage(function ($message) use ($headers) {
                $messageHeaders = $message->getHeaders();

                foreach ($headers as $header => $value) {
                    $messageHeaders->addTextHeader($header, $value);
                }
            })
            ->view('admin.module.dummies::mails.dummy', ['dummy' => $this->dummy]);
    }
}
