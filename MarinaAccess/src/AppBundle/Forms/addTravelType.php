<?php

/**
 * Created by PhpStorm.
 * User: axel
 * Date: 30/12/2016
 * Time: 15:00
 */
namespace AppBundle\Forms;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TimeType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\City;
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\Mooring;
use Doctrine\ORM\EntityManager;



class addTravelType extends AbstractType
{


    public function buildForm(FormBuilderInterface $builder, array $options)
    {

        $builder
            ->add('dateOccupation',DateTimeType::class, array(
                'date_widget' => "single_text",
                'time_widget' => "single_text",
                'label' => "Date d'occupation",
            ))
            ->add('dateLiberation',DateTimeType::class, array(
                'date_widget' => "single_text",
                'time_widget' => "single_text",
                'label' => "Date de libération",
            ))


            ->add('valider', SubmitType::class, array('label' => 'Proposer le trajet', 'attr' => ['class' => 'btn waves-effect waves-light']))->getForm();
    }

        public function	configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('travel_class' => Mooring::class));
    }



}