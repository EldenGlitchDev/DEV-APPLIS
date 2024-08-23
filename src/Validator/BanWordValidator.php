<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class BanWordValidator extends ConstraintValidator
{
    public function validate(mixed $value, Constraint $constraint): void
    {
        /** @var BanWord $constraint */

        if (null === $value || '' === $value) {
            return;
        }

        $value = strtolower($value);
        foreach ($constraint->banWords as $banWord){ /* Parcourir ensemble des mots bannis dans 'BanWord.php' grâve au foreach */
            if (str_contains($value, $banWord)){ /* Si ma chaine de caractère 'value' contient mon mot banni ($banWord), alors on a une erreur */
                $this->context->buildViolation($constraint->message)
            ->setParameter('{{ banWord }}', $banWord)
            ->addViolation();
            }

        }

    }
}
