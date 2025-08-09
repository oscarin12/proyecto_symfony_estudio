<?php

namespace App\Form;
use App\Entity\Usuario; // Ensure you import the Usuario entity
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UsuariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nombre')
            ->add('email')
            ->add('password')  // Assuming 'contra' is the field for password
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
       $resolver->setDefaults([
            // Configure your form options here
            'data_class' => Usuario::class
        ]);
    }
}
