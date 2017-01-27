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
use AppBundle\Entity\Boat;
use AppBundle\Forms\RegisterBoatType;

class RegisterBoatController extends Controller
{
    /**
     * @Route("/registerBoat", name="registerBoat")
     */
    public function registerAction(Request $request)
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();
        }

        $boat = new Boat();

        $form = $this->createForm(RegisterBoatType::class, $boat);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $boat->setCapitaine($user);

            $em = $this->getDoctrine()->getManager();
            $em->persist($boat);
            $em->flush();

            /*  $mooring = new Mooring();

              $mooring->setPlace($user->getEmplacement());
              $mooring->setLargeurMax('20');
              $mooring->setLongueurMax('20');
              $mooring->setTirantEauMax('5');
              $mooring->setEtat('En attente');
              $mooring->setProprietaire($user);
              $mooring->setDateLiberation(new \DateTime());
              $mooring->setDateOccupation(new \DateTime());

              $em->persist($mooring);
              $em->flush(); */

            return $this->redirectToRoute('home');
        }

        // return $this->render('AppBundle:Register:register.html.twig', array());

        return $this->render('AppBundle:Register:registerBoat.html.twig', array('user' => $user, 'form' => $form->createView()));
    }
}