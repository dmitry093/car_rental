<?php

namespace AppBundle\Controller;

use AppBundle\Entity\RentalHistory;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Rentalhistory controller.
 *
 */
class RentalHistoryController extends Controller
{
    /**
     * Lists all rentalHistory entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rentalHistories = $em->getRepository('AppBundle:RentalHistory')->findAll();

        return $this->render('rentalhistory/index.html.twig', array(
            'rentalHistories' => $rentalHistories,
        ));
    }

    /**
     * Creates a new rentalHistory entity.
     *
     */
    public function newAction(Request $request)
    {
        $rentalHistory = new Rentalhistory();
        $form = $this->createForm('AppBundle\Form\RentalHistoryType', $rentalHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($rentalHistory);
            $em->flush();

            return $this->redirectToRoute('history_show', array('id' => $rentalHistory->getId()));
        }

        return $this->render('rentalhistory/new.html.twig', array(
            'rentalHistory' => $rentalHistory,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a rentalHistory entity.
     *
     */
    public function showAction(RentalHistory $rentalHistory)
    {
        $deleteForm = $this->createDeleteForm($rentalHistory);

        return $this->render('rentalhistory/show.html.twig', array(
            'rentalHistory' => $rentalHistory,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing rentalHistory entity.
     *
     */
    public function editAction(Request $request, RentalHistory $rentalHistory)
    {
        $deleteForm = $this->createDeleteForm($rentalHistory);
        $editForm = $this->createForm('AppBundle\Form\RentalHistoryType', $rentalHistory);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('history_edit', array('id' => $rentalHistory->getId()));
        }

        return $this->render('rentalhistory/edit.html.twig', array(
            'rentalHistory' => $rentalHistory,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a rentalHistory entity.
     *
     */
    public function deleteAction(Request $request, RentalHistory $rentalHistory)
    {
        $form = $this->createDeleteForm($rentalHistory);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($rentalHistory);
            $em->flush();
        }

        return $this->redirectToRoute('history_index');
    }

    /**
     * Creates a form to delete a rentalHistory entity.
     *
     * @param RentalHistory $rentalHistory The rentalHistory entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(RentalHistory $rentalHistory)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('history_delete', array('id' => $rentalHistory->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
