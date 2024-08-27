<?php

/*namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new Email())
            ->from('hello@example.com')
            ->to('you@example.com')
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer !')
            ->text('Sending emails is fun again ! (NOOOOO !!!!!)')
            ->html('<p>See Twig integration for more examples</p>');

        $mailer->send($email);

        return $this->render('mailer/index.html.twig', [
            'controller_name' => 'MailerController',
        ]);
    }
}*/


/* METHODE AVEC TWIG BUNDLE */

namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
/*use Symfony\Component\Mime\Email;*/
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mime\Part\DataPart;
use Symfony\Component\Mime\Part\File;

class MailerController extends AbstractController
{
    #[Route('/mailer', name: 'app_mailer')]
    public function sendEmail(MailerInterface $mailer): Response
    {
        $email = (new TemplatedEmail())
            ->from('hello@example.com')
            ->to(new Address ('you@example.com'))
            //->cc('cc@example.com')
            //->bcc('bcc@example.com')
            //->replyTo('fabien@example.com')
            //->priority(Email::PRIORITY_HIGH)
            ->subject('Time for Symfony Mailer !')

            ->addPart(new DataPart(new File('/path/to/documents/terms-of-use.pdf')))
            // vous pouvez, si vous le souhaitez, demander aux clients mail d'afficher un certain nom pour le fichier 
            ->addPart(new DataPart(new File('/path/to/documents/privacy.pdf'), 'Privacy Policy'))
            // vous pouvez aussi spécifier le type de document (autrement, il est deviné)
            ->addPart(new DataPart(new File('/path/to/documents/contract.doc'), 'Contract', 'application/msword'))

            ->addPart((new DataPart(fopen('/path/to/images/logo.png', 'r'), 'logo', 'image/png'))->asInline())
            ->addPart((new DataPart(new File('/path/to/images/signature.gif'), 'footer-signature', 'image/gif'))->asInline())

            // utiliser la syntaxe 'cid:' + "nom de l'image intégrée " pour référencer l'image
            ->html('<img src="cid:logo"> ... <img src="cid:footer-signature"> ...')

            // utiliser la même syntaxe pour les images intégrées en tant que background
            ->html('... <div background="cid:footer-signature"> ... </div> ...')

            // le chemin de la vue Twig à utiliser dans le mail
            ->htmlTemplate('mailer/signup.html.twig')

            // un tableau de variable à passer à la vue; 
            //  on choisit le nom d'une variable pour la vue et on lui attribue une valeur (comme dans la fonction `render`) :
            ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'username' => 'foo',
            ]);

        $mailer->send($email);

        return $this->render('mailer/signup.html.twig', [
            'controller_name' => 'MailerController',
            'email' => $email
        ]);
    }
}