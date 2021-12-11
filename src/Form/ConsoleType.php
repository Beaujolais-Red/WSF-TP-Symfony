<?php

namespace App\Form;

use App\Entity\Console;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class ConsoleType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom',
                'required' => true
            ])
            ->add('FreeOnline', CheckboxType::class, [
                'label' => 'Online gratuit',
                'required' => true
            ])
            ->add('Price', MoneyType::class, [
                'divisor' => 100,
                'label' => 'Prix de la console',
                'required' => true
            ])
            ->add('Retrocompability', CheckboxType::class, [
                'label' => 'Rétrocompatibilité',
                'required' => false
            ])
            -> add('Developer', EntityType::class, [
                'label' => 'Quel(s) développeur(s) sont liés à la console',
                'class' => Developer::class,
                'choice_label' => 'Name',
                'multiple' => true,
                'required' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Console::class,
        ]);
    }
}
