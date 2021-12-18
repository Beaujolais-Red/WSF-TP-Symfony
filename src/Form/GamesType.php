<?php

namespace App\Form;

use App\Entity\Games;
use App\Entity\Console;
use App\Entity\Developer;
use App\Entity\Genre;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;


class GamesType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Name', TextType::class, [
                'label' => 'Nom',
                'required' => true
            ])
            ->add('PegiRating', IntegerType::class, [
                'label' => 'Pegi',
                'required' => true
            ])
            ->add('Price', MoneyType::class, [
                'label' => 'Prix',
                'required' => true
            ])
            ->add('Multiplayer', TextType::class, [
                'label' => 'Multijoueur',
                'required' => false
            ])
            ->add('LastUpdateVersion', NumberType::class, [
                'label' => 'Dernière version en date',
                'required' => false
            ])
            ->add('ESport', TextType::class, [
                'label' => 'E-sport',
                'required' => false
            ])
            ->add('Console', EntityType::class, [
                'label' => 'Quel(les) console(s)',
                'class' => Console::class,
                'choice_label' => 'Name',
                'multiple' => true,
                'required' => true,
                'mapped' => false
            ])
            -> add('Developer', EntityType::class, [
                'label' => 'Quel développeur',
                'class' => Developer::class,
                'choice_label' => 'Name',
                'multiple' => false,
                'required' => true,
                'mapped' => false

            ])
            -> add('Genre', EntityType::class, [
                'label' => 'Quel genre',
                'class' => Genre::class,
                'choice_label' => 'Name',
                'multiple' => true,
                'required' => true,
                'mapped' => false
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Games::class,
        ]);
    }
}
