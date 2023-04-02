<?php

namespace App\Form;

use App\Entity\Cours;
use App\Entity\Ecole1;
use App\Entity\Eleve;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Ecole1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
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
            ->add('cours', EntityType::class, [
                'label' => 'Nom du cours : ',
                'class' => Cours::class,
                'choice_label' => 'nom',
                'expanded' => false,
                'placeholder' => 'Choisissez un élève',
                'required' => false,
                'multiple' => false,
            ])
            ->add('semaine', ChoiceType::class, [
                'placeholder' => 'Choisissez une semaine',
                'choices' => $this->generateChoices()
            ])
            ->add('notion', TextareaType::class, [
            ])
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
