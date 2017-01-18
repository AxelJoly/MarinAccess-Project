<?php

/**
 * Created by PhpStorm.
 * User: axel
 * Date: 29/12/2016
 * Time: 19:17
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


class RegisterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('mail',EmailType::class)
            ->add('mdp',PasswordType::class)
            ->add('firstName',TextType::class)
            ->add('lastName',TextType::class)
            ->add('numPermis',TextType::class)
            ->add('nationalite',TextType::class)
            ->add('numUrgence', TextType::class)
            ->add('photo',  FileType::class, array(
            		'required' => false, 'label' => 'Photo de profil  ',
            		'attr' => ['class' => 'btn waves-effect waves-light ']
            		
            ))
            ->add('save', SubmitType::class, array(
            		'attr' => ['class' => 'btn waves-effect waves-light center-align ']
            ));
    }


    public function	configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('user_class' => User::class));
    }

}