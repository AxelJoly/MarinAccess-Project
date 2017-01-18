<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 10/01/2017
 * Time: 17:04
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Forms\RegisterType;
use AppBundle\Entity\Mooring;

class AddTravelController extends Controller
{
    /**
     * @Route("/newTravelForm", name = "newTravelForm")
     */

    public function createTravelFormAction(Request $request)
    {


        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }

        $travel = new Mooring();

        $form = $this->createForm(RegisterType::class, $user);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($travel);
            $em->flush();
            $travel = $this->getDoctrine()->getRepository('AppBundle:Travel')->findAll();
            return $this->redirectToRoute('home', array('user' => $user, 'travel' => $travel));
        }

        return $this->render('AppBundle:Travel:travelform.html.twig', array('city' => $city, 'user' => $user, 'form' => $form->createView()));
    }
}