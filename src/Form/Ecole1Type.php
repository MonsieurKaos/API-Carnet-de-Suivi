<?php

namespace App\Form;

use App\Entity\Ecole1;
use App\Entity\Eleve;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Ecole1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
            $builder->add('eleveId', EntityType::class, [
                'label' => 'Équipe : ',
                'class' => Eleve::class,
                'choice_label' => 'nom',
                'expanded' => false,
                'placeholder' => 'Choisissez un élève',
                'required' => false,
                'multiple' => false,
            ])
            ->add('coursId')
            ->add('semaine')
            ->add('notion')
            ->add('eval', ChoiceType::class, [
                'choices' => [
                    'N (Notion)' => 'N',
                    'A (Application)' => 'A',
                    'M (Maitrise)' => 'M',
                    'E (Expertise)' => 'E',
                    'O (Sans Objet)' => 'O',
                ],
                'placeholder' => 'Choisissez un niveau d\'évalutation',
            ])
            ->add('commentaire')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ecole1::class,
        ]);
    }
}
