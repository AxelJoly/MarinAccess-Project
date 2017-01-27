<?php
/**
 * Created by PhpStorm.
 * User: Régis
 * Date: 25/01/2017
 * Time: 10:30
 */

namespace AppBundle\Forms;


use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Boat;

class RegisterBoatType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('portAttache',TextType::class, array(
                'label' => 'Port d\'attache de l\'embarcation',
            ))
            ->add('proprietaire',TextType::class, array(
                'label' => 'Propriétaire de l\'embarcation',
            ))
            ->add('immatriculation',TextType::class, array(
                'label' => 'Immatriculation de l\'embarcation',
                'attr' => ['placeholder' => 'Attention ! Toute fraude pourra entrainer des poursuites judiciaires.'],
            ))
            ->add('longueur',NumberType::class, array(
                'label' => 'Longueur en mètres ',
                'attr' => ['pattern' => '[0-9]{3}'],
            ))
            ->add('largeur',NumberType::class, array(
                'label' => 'Largeur en mètres',
                'attr' => ['pattern' => '[0-9]{3}'],
            ))
            ->add('tirantEau',NumberType::class, array(
                'label' => 'Tirant d\'eau en mètres',
                'attr' => ['pattern' => '[0-9]{3}'],
            ))
            ->add('save', SubmitType::class, array(
                'attr' => ['class' => 'btn waves-effect waves-light blue lighten-1 center-align ']
            ));

    }


    public function	configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('boat_class' => Boat::class));
    }
}