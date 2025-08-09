<?php

namespace App\Validator;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class NoNumerosValidator extends ConstraintValidator
{
   public function validate($value, Constraint $constraint)
{
    /* @var App\Validator\Nonumeros $constraint */
/* ESTO HACE QUE EL NOMBRE NO DEBE TENER NUMERO  */
    if (preg_match('/\d/', $value)) {
        $this->context->buildViolation($constraint->message)
            ->setParameter('{{ value }}', $value)
            ->addViolation();
    }
}

}
