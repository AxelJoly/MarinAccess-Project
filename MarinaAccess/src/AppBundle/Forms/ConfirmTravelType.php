<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 25/01/2017
 * Time: 17:20
 */

namespace AppBundle\Forms;


use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\AbstractType;
use AppBundle\Entity\User;
use Doctrine\ORM\EntityRepository;




class ConfirmTravelType extends AbstractType
{


    /**
     * ConfirmTravelType constructor.
     */


    public function buildForm(FormBuilderInterface $builder, array $options){



        $builder
            ->add('bateauAmarre', EntityType::class, array(
                'class' => 'AppBundle:Boat',
                'choice_label' => 'immatriculation',
                'query_builder' => function (EntityRepository $er){

                    return $er->createQueryBuilder('u')
                        ->where('u.capitaine = ?1')
                        ->orderBy('u.immatriculation', 'ASC');

    },

                'label' => 'Bateau',
                'attr' => ['class' => 'browser-default'],
            ));


    }

    public function	configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('user_class' => Mooring::class));
    }
}