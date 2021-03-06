<?php

namespace App\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ClientType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nip', TextType::class)
            ->add('regon', TextType::class)
            ->add('name', TextType::class)
            ->add('is_vat_payer', CheckboxType::class, array(
                'required' => false,
            ))
            ->add('street', TextType::class)
            ->add('property_num', TextType::class)
            ->add('flat_num', TextType::class)
            ->add('save', SubmitType::class);

    }


}