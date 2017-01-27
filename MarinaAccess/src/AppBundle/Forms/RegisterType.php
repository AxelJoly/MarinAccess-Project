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
use Doctrine\ORM\EntityRepository;


class RegisterType extends AbstractType
{

    public function buildForm(FormBuilderInterface $builder, array $options){

        $builder
            ->add('mail',EmailType::class, array(
                'label' => 'Email ',
            ))

            ->add('mdp',PasswordType::class, array(
                'label' => 'Mot de passe ',
            ))
            ->add('firstName',TextType::class, array(
                'label' => 'Prénom',
            ))
            ->add('lastName',TextType::class, array(
                'label' => 'Nom',
            ))
            ->add('numPermis',TextType::class, array(
                'label' => 'Numéro de permis',
                'attr' => ['placeholder' => 'Attention ! Toute fraude pourra entrainer des poursuites judiciaires.'],
            ))
            ->add('nationalite',TextType::class, array(
                'label' => 'Nationalité',
            ))
            ->add('numUrgence', TextType::class, array(
                'label' => "Numéro d'urgence",
                'attr' => ['pattern' => '^(?:0|\(?\+33\)?\s?|0033\s?)[1-79](?:[\.\-\s]?\d\d){4}$'],
            ))
            ->add('photo',  TextType::class, array(
                 'label' => 'Photo de profil (URL) ',
                'attr' => ['placeholder' => 'Veuillez renseigner une photo d\'identité.']


            ))
            ->add('save', SubmitType::class, array(
            		'attr' => ['class' => 'btn waves-effect waves-light blue lighten-1 center-align ']
            ));
    }


    public function	configureOptions(OptionsResolver $resolver){
        $resolver->setDefaults(array('user_class' => User::class));
    }

}