<?php
/**
 * Created by PhpStorm.
 * User: axel
 * Date: 21/01/2017
 * Time: 16:09
 */

namespace AppBundle\Controller;



use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use AppBundle\Forms\ModifyType;

class AdminController extends Controller
{
    /**
     * @Route("/admin", name="admin")
     *
     */
    public function adminAction()
    {

        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');



        $users = $this->getDoctrine()->getRepository('AppBundle:User')->findAll();


        return $this->render('AppBundle:Admin:admin.html.twig', array('user' => $user, 'users' => $users));
    }



    /**
     * @Route("/modify/{mail}", name="modify")
     *
     */
    public function modifyAction(Request $request, $mail)
    {

        if( $this->container->get( 'security.authorization_checker' )->isGranted( 'IS_AUTHENTICATED_FULLY' ) )
        {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        $dude = $this->getDoctrine()->getRepository('AppBundle:User')->find($mail);
        dump($dude);

        $form = $this->createForm(ModifyType::class, $dude);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $em->persist($dude);
            $em->flush();
            return $this->redirectToRoute('admin');
        }


        return $this->render('AppBundle:Admin:modify.html.twig', array('user' => $user, 'form' => $form->createView(),));
    }


    /**
     * @Route("/delete/{mail}", name="delete")
     *
     */
    public function deleteAction($mail)
    {

        if ($this->container->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->container->get('security.token_storage')->getToken()->getUser();

        }
        $this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');


        $userToDelete = $this->getDoctrine()->getRepository('AppBundle:User')->find($mail);
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT mooring FROM AppBundle\Entity\Mooring mooring WHERE mooring.place = :place');
        $query->setParameters(array(
            'place' => $userToDelete->getEmplacement(),
        ));
        $check = $query->getResult();

        dump($check);
        $em = $this->getDoctrine()->getManager();

        if ($check != null)
        {    $mooring = $check[0];
        $mooring->setProprietaire(null);
        $mooring->setBateauAmarre(null);
        $em->persist($mooring);
    }
        $em->remove($userToDelete);
        $em->flush();

        return $this->redirectToRoute('admin');
    }
}