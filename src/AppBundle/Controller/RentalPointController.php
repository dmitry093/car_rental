<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RentalPoint;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Rentalpoint controller.
 *
 */
class RentalPointController extends Controller
{
    /**
     * Lists all rentalPoint entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rentalPoints = $em->getRepository('AppBundle:RentalPoint')->findAll();

        return $this->render('rentalpoint/index.html.twig', array(
            'rentalPoints' => $rentalPoints,
        ));
    }

    /**
     * Creates a new rentalPoint entity.
     *
     */
    public function newAction(Request $request)
    {
        $rentalPoint = new Rentalpoint();
        $form = $this->createForm('AppBundle\Form\RentalPointType', $rentalPoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rentalPoint);
            $em->flush();

            return $this->redirectToRoute('rentalpoint_show', array('id' => $rentalPoint->getId()));
        }

        return $this->render('rentalpoint/new.html.twig', array(
            'rentalPoint' => $rentalPoint,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rentalPoint entity.
     *
     */
    public function showAction(RentalPoint $rentalPoint)
    {
        $deleteForm = $this->createDeleteForm($rentalPoint);

        return $this->render('rentalpoint/show.html.twig', array(
            'rentalPoint' => $rentalPoint,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rentalPoint entity.
     *
     */
    public function editAction(Request $request, RentalPoint $rentalPoint)
    {
        $deleteForm = $this->createDeleteForm($rentalPoint);
        $editForm = $this->createForm('AppBundle\Form\RentalPointType', $rentalPoint);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('rentalpoint_show', array('id' => $rentalPoint->getId()));
        }

        return $this->render('rentalpoint/edit.html.twig', array(
            'rentalPoint' => $rentalPoint,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rentalPoint entity.
     *
     */
    public function deleteAction(Request $request, RentalPoint $rentalPoint)
    {
        $form = $this->createDeleteForm($rentalPoint);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rentalPoint);
            $em->flush();
        }

        return $this->redirectToRoute('rentalpoint_index');
    }

    /**
     * Creates a form to delete a rentalPoint entity.
     *
     * @param RentalPoint $rentalPoint The rentalPoint entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RentalPoint $rentalPoint)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('rentalpoint_delete', array('id' => $rentalPoint->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
