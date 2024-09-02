<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;

class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {

        $contact = new Contact();

        /*if ($this->getUser()){
            $contact->setFullName($this->getUser()->getFullName())
            ->setEmail($this->getUser()->getEmail());
        }*/

        $form = $this->createForm(ContactFormType::class, $contact);
        
        $form->handleRequest($request); /* nous utilisons la méthode handleRequest() pour traiter la requête HTTP actuelle et valider les données soumises. */

            if($form->isSubmitted() && $form->isValid()){ /* "if ($form->isSubmitted()" si le formulaire est soumis ET "&& $form->isValid())" si le formulaire est valide, nous pouvons accéder aux données du formulaire à l'aide de la méthode getData().*/
                //on crée une instance de Contact
                //$message = new Contact();
                // Traitement des données du formulaire
                $contact = $form->getData(); /* En spécifiant null comme valeur de data_class (dans ContactFormType.php), vous pouvez traiter les données du formulaire directement à partir du tableau renvoyé par la méthode getData() du formulaire. */
                //on stocke les données récupérées dans la variable $message
                //$message = $data;



                $entityManager->persist($contact); /* persist qui permet de spécifier à doctrine qu'une nouvelle entité doit être persisté. */
                $entityManager->flush(); /* flush qui indique à doctrine de générer le code sql pour mettre à jour votre base. */


                // Mail à partir d'ici
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
    
                try {
                    $mailer->send($email);
                } catch (TransportExceptionInterface $e) {
                    // some error prevented the email sending; display an
                    // error message or try to resend the message
                }


                return $this->redirectToRoute('app_accueil');
            }

        return $this->render('contact/index.html.twig', [
            //'form' => $form->createView(), /*jusqu'à 6.2 méthode createView() pour générer une représentation du formulaire prête à être affichée dans notre template. */
            'form' => $form
        ]);
    }
}


/* Exemple service en Symfony */

/*namespace App\Controller;

use App\Entity\Contact;
use App\Form\DemoFormType;
use App\Form\ContactFormType;
use App\Service\MailService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class ContactController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer, MailService $ms): Response
    {
        $form = $this->createForm(ContactFormType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            //on crée une instance de Contact
            $message = new Contact();
            // Traitement des données du formulaire
            //...
            //persistance des données

            $entityManager->persist($message);
            $entityManager->flush();

            //envoi de mail avec notre service MailService
            $email = $ms->sendMail('hello@example.com', $message->getEmail(), $message->getObjet(), $message->getMessage() );
//            dd($message->getEmail());

        }
        
    }
}*/

