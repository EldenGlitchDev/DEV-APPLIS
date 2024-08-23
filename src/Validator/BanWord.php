<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;


#[\Attribute(\Attribute::TARGET_PROPERTY | \Attribute::TARGET_METHOD | \Attribute::IS_REPEATABLE)]
class BanWord extends Constraint
{
    
    public function __construct(

        public string $message = 'Ce message contient un mot banni : "{{ banWord }}".',
        public array $words = ['spam', 'viagra'],
        ?array $groups = null,
        mixed $payload = null)
    {
        parent::__construct(null, $groups, $payload); /* Récupération de l'élément parent dans le 'Constraint' (ligne 9) dans 'Constraint.php' ($groups et $payload ont
                                                        été déplacé ligne 16 et 17, donc rappelle de variables à la ligne 19) */
    }

}
