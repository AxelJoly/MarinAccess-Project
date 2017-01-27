<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 10/01/2017
 * Time: 13:38
 */

namespace AppBundle\Controller;

use AppBundle\Forms\ConfirmTravelType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\DateTime;
use AppBundle\Forms\MooringType;
use AppBundle\Entity\Mooring;
use AppBundle\Entity\User;

class SeatController extends Controller
{

    /**
     * @Route("/", name="home")
     *
     */
    public function loginAction()
    {

        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }


        $seat = $this->getDoctrine()->getRepository('AppBundle:Mooring')->findAll();
        $date = new \DateTime();

        dump($user);
        $em = $this->getDoctrine()->getManager();

        for($i = 0; $i < count($seat); $i++){
            $state = $seat[$i]->getDateLiberation() < $date;


            if ($state == true){


                $seat[$i]->setEtat("En attente");
                $seat[$i]->setDateOccupation(null);
                $seat[$i]->setDateOccupation(null);
                $seat[$i]->setBateauAmarre(null);
                $em->persist($seat[$i]);
                $em->flush();
            }
         }
        $mooring = $this->getDoctrine()->getRepository('AppBundle:Mooring')->findAll();


        return $this->render('AppBundle:Travel:travel.html.twig', array('user' => $user, 'travel' => $mooring));
    }



    /**
     * @Route("/confirm/{id}", name="confirm")
     *
     */
    public function confirmAction( $id)
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }

        $mooring = $this->getDoctrine()->getRepository('AppBundle:Mooring')->find($id);

        return $this->render('AppBundle:Travel:confirm.html.twig', array('user' => $user, 'mooring' => $mooring, ));
    }

    /**
     * @Route("/confirmed/{id}", name="confirmed")
     *
     */
    public function confirmedAction($id)
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }
        $em = $this->getDoctrine()->getManager();

        $mooring = $this->getDoctrine()->getRepository('AppBundle:Mooring')->find($id);
        $query = $em->createQuery('SELECT bateau FROM AppBundle\Entity\Boat bateau WHERE bateau.capitaine = :capitaine');
        $query->setParameters(array(
            'capitaine' => $user,
        ));
        $check = $query->getResult();
        dump($check);

        $mooring->setBateauAmarre($check[0]);
        $mooring->setEtat("Occupé");

        $em->persist($mooring);
        $em->flush();

        return $this->redirectToRoute('home');
    }

    /**
     * @Route("/mooring/", name="mooring")
     *
     */
    public function modifyMooringAction(Request $request)
    {
        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }
        $em = $this->getDoctrine()->getManager();
        $mooring = new Mooring();

        $form = $this->createForm(MooringType::class, $mooring);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mooring->setEtat("En attente");
            $mooring->setProprietaire($user);

            $em->persist($mooring);
            $user->setEmplacement($mooring->getPlace());
            $em->flush();
            return $this->redirectToRoute('home');
        }
        return $this->render('AppBundle:Travel:mooringModify.html.twig', array('user' => $user, 'form' => $form->createView()));
    }
}