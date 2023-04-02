<?php

namespace App\Form;

use App\Entity\Eleve;
use App\Entity\Entreprise;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EntrepriseType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder->add('eleve', EntityType::class, [
            'label' => 'Nom de l\'élève : ',
            'class' => Eleve::class,
            'choice_label' => 'nom',
            'expanded' => false,
            'placeholder' => 'Choisissez un élève',
            'required' => false,
            'multiple' => false,
        ])
            ->add('semaine', ChoiceType::class, [
                'label' => 'Semaine : ',
                'placeholder' => 'Choisissez une semaine',
                'choices' => $this->generateChoices()
            ])
            ->add('actiPrev', TextareaType::class, [
                'label' => 'Activité prévue : ',
            ])
            ->add('actiRea', TextareaType::class, [
                'label' => 'Activité réalisée : ',
            ])
            ->add('commentaire', TextareaType::class, [
                'label' => 'Commentaire : ',
            ])
            ->add('compeMiseEnEouvre', TextareaType::class, [
                'label' => 'Compétences mises en oeuvre : ',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Entreprise::class,
        ]);
    }

    /**
     * Generate a choice array from start year to end year
     *
     * @return array
     */
    protected function generateChoices()
    {
        $semaine   = range(1, 53);
        $choices = array();

        foreach($semaine as $sem) {
            $choices['Semaine '.$sem] = $sem;
        }

        return $choices;
    }

}
