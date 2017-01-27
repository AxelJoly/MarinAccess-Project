<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 10/01/2017
 * Time: 17:04
 */

namespace AppBundle\Controller;

use AppBundle\Forms\addTravelType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Forms\RegisterType;
use AppBundle\Entity\Mooring;

class AddTravelController extends Controller
{
    /**
     * @Route("/newTravelForm/{id}", name = "newTravelForm")
     */

    public function createTravelFormAction(Request $request, $id)
    {


        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }
       /* $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT id FROM AppBundle\Entity\Mooring id WHERE id.bateauTitu.capitaine.mail = :mail');
        $query->setParameters(array(
            'mail' => $user->getMail(),
        ));
        $check = $query->getResult();

*/
        $mooring = $this->getDoctrine()->getRepository('AppBundle:Mooring')->find($id);
        $em = $this->getDoctrine()->getManager();


        $form = $this->createForm(addTravelType::class, $mooring);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $mooring->setEtat("Libre");
            $em = $this->getDoctrine()->getManager();
            $em->persist($mooring);
            $em->flush();
          //  $travel = $this->getDoctrine()->getRepository('AppBundle:Travel')->findAll();
            return $this->redirectToRoute('home', array('user' => $user));
        }

        return $this->render('AppBundle:Travel:travelform.html.twig', array('user' => $user, 'form' => $form->createView()));
    }
}