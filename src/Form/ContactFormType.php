<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver; /*Pour pouvoir utiliser configureOption*/
use Symfony\Component\Form\Extension\Core\Type\SubmitType; /*Utilisation du SubmitType*/

class ContactFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('objet')
            ->add('email')

             //On a rajouté un label et on a rendu le champ optionnel en
            // donnant la valeur false à l'attribut required
            ->add('message', TextareaType::class, [
                'label' => 'Votre message',
                'required' => false
            ]
        )
            ->add('save', SubmitType::class, [ /*besoin de use Symfony\Component\Form\Extension\Core\Type\SubmitType;*/
                'label' => 'Envoyer votre message'])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class, /*lien avec l'entité Contact (Contact.php), donc lien à la base de données*/
        ]);
    }
}
