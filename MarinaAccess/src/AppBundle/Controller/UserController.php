<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 29/12/2016
 * Time: 16:49
 */

namespace AppBundle\Controller;


use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{

    /**
     * @Route("/", name="home")
     */
    public function indexAction()
    {
        return $this->render('AppBundle:Default:index.html.twig', array());
    }

    /**
     * @Route("/register", name="register")
     */
    public function registerAction()
    {
        return $this->render('AppBundle:Register:register.html.twig', array(

        ));
    }
}