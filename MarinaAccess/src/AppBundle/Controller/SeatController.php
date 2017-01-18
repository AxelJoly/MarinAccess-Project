<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 10/01/2017
 * Time: 13:38
 */

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

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


        return $this->render('AppBundle:Travel:travel.html.twig', array('user' => $user, 'travel' => $seat));
    }
}