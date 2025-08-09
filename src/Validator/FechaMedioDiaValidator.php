<?php

namespace App\Validator;

use App\Service\FechaService;
use Psr\Log\LoggerInterface;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class FechaMedioDiaValidator extends ConstraintValidator
{
   private FechaService $fechaService;
   private LoggerInterface $logger;

public function __construct(FechaService $fechaService, LoggerInterface $logger)
{
    $this->fechaService = $fechaService;
    $this->logger = $logger;
}

    public function validate($value, Constraint $constraint)
    {
        /* @var $constraint \App\Validator\FechaMedioDia */
        $this->logger->info('✅ Entró al validador FechaMedioDia');
        $this->logger->info('📅 Valor recibido en el validador: ' . var_export($value, true));
        $fechaActual = new \DateTime($this->fechaService->obtenerFechaActual());
        $horaActual = (int) $fechaActual->format('H');

        if ($horaActual >= 12) {
            $this->context->buildViolation($constraint->message)
                ->addViolation();
           
        }
    }
}
