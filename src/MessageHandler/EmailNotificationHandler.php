<?php

namespace App\MessageHandler;

use App\Message\EmailNotification;
use App\Security\EmailVerifier;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class EmailNotificationHandler
{
    public function __construct(private EmailVerifier $emailVerifier) 
    {
    }

    public function __invoke(EmailNotification $message)
    {
        $this->emailVerifier->sendEmailConfirmation('app_verify_email', $message->getUser(),
            (new TemplatedEmail())
                ->from(new Address('welcome@e-commerce.com', 'E-commerce'))
                ->to($message->user->getEmail())
                ->subject('Please Confirm your Email')
                ->htmlTemplate('registration/confirmation_email.html.twig')
        ); 

    }
}