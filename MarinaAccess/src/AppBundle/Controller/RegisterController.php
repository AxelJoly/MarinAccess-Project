<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 19/11/2016
 * Time: 23:43
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Mooring;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\User;
use AppBundle\Forms\RegisterType;

class RegisterController extends Controller
{
    /**
     * @Route("/register", name="register")
     */
    public function registerAction(Request $request)
    {
        $user = new User();

        $user->setRoles(["ROLE_USER"]);
        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

        	//HASH du password
        	$plainPassword = $user->getPassword();
        	$encoder = $this->container->get('security.password_encoder');
        	$encoded = $encoder->encodePassword($user, $plainPassword);


        	
        	$user->setMdp($encoded);

            $em = $this->getDoctrine()->getManager();
            $em->persist($user);

            if($user->getEmplacement() != null) {
                $mooring = new Mooring();

                $mooring->setPlace($user->getEmplacement());
                $mooring->setLargeurMax('20');
                $mooring->setLongueurMax('20');
                $mooring->setTirantEauMax('5');
                $mooring->setEtat('En attente');
                $mooring->setProprietaire($user);
                $mooring->setDateLiberation(new \DateTime());
                $mooring->setDateOccupation(new \DateTime());

                $em->persist($mooring);
            }
            $em->flush();

            return $this->redirectToRoute('home');
        }

       // return $this->render('AppBundle:Register:register.html.twig', array());

        return $this->render('AppBundle:Register:register.html.twig', array('form' => $form->createView()));
    }
}