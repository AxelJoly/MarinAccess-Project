<?php

/**
 * Created by PhpStorm.
 * User: axel
 * Date: 21/01/2017
 * Time: 18:49
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

class ModifyType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('firstName',TextType::class, array(
                'required' => false,))
            ->add('lastName',TextType::class, array(
                'required' => false,))
            ->add('numPermis',TextType::class, array(
                'required' => false,))
            ->add('nationalite',TextType::class, array(
                'required' => false,))
            ->add('numUrgence', TextType::class, array(
                'required' => false,))
            ->add('emplacement', EntityType::class, array(
                'class' => 'AppBundle:Seat',
                'choice_label' => 'numPlace',
                'label' => 'Vous possedez une place? Ajoutez la!',
                'attr' => ['class' => 'browser-default'],
            ))

            ->add('save', SubmitType::class, array(
                'label' => 'Mettre a jour',
                'attr' => ['class' => 'btn waves-effect waves-light center-align ']
            ));
    }


    public function	configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('user_class' => User::class));
    }

}