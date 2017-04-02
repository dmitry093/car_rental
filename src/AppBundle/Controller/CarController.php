<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Car;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Car controller.
 *
 */
class CarController extends Controller
{
    /**
     * Lists all car entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cars = $em->getRepository('AppBundle:Car')->findAll();

        return $this->render('car/index.html.twig', array(
            'cars' => $cars,
        ));
    }

    /**
     * Creates a new car entity.
     *
     */
    public function newAction(Request $request)
    {
        $car = new Car();
        $form = $this->createForm('AppBundle\Form\CarType', $car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $car->getPicture();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('car_images_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $car->setPicture($fileName);

            $em = $this->getDoctrine()->getManager();
            $em->persist($car);
            $em->flush();

            return $this->redirectToRoute('car_show', array('id' => $car->getId()));
        }

        return $this->render('car/new.html.twig', array(
            'car' => $car,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a car entity.
     *
     */
    public function showAction(Car $car)
    {
        $deleteForm = $this->createDeleteForm($car);

        $em = $this->getDoctrine()->getManager();
        $qb = $em->createQueryBuilder();
        $qb->select('AVG(TIMESTAMPDIFF(MINUTE, rh.date_start, rh.date_end)) as minutes, rp.name, rp.id')
            ->from('AppBundle:RentalHistory', 'rh')
            ->join('rh.RentalPointStart', 'rp')
            ->where('rh.Car = :car_id')
            ->setParameter('car_id', $car->getId())
            ->groupBy('rh.RentalPointStart');
        $query = $qb->getQuery();
        $timings_start = $query->getResult();

        $qb = $em->createQueryBuilder();
        $qb->select('AVG(TIMESTAMPDIFF(MINUTE, rh.date_start, rh.date_end)) as minutes, rp.name, rp.id')
            ->from('AppBundle:RentalHistory', 'rh')
            ->join('rh.RentalPointEnd', 'rp')
            ->where('rh.Car = :car_id')
            ->setParameter('car_id', $car->getId())
            ->groupBy('rh.RentalPointEnd');
        $query = $qb->getQuery();

        $timings_end = $query->getResult();


        return $this->render('car/show.html.twig', array(
            'car' => $car,
            'timings_start' => $timings_start,
            'timings_end' => $timings_end,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing car entity.
     *
     */
    public function editAction(Request $request, Car $car)
    {
        $deleteForm = $this->createDeleteForm($car);
        $editForm = $this->createForm('AppBundle\Form\CarType', $car);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $car->getPicture();

            // Generate a unique name for the file before saving it
            $fileName = md5(uniqid()).'.'.$file->guessExtension();

            // Move the file to the directory where brochures are stored
            $file->move(
                $this->getParameter('car_images_directory'),
                $fileName
            );

            // Update the 'brochure' property to store the PDF file name
            // instead of its contents
            $car->setPicture($fileName);


            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('car_show', array('id' => $car->getId()));
        }

        return $this->render('car/edit.html.twig', array(
            'car' => $car,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a car entity.
     *
     */
    public function deleteAction(Request $request, Car $car)
    {
        $form = $this->createDeleteForm($car);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($car);
            $em->flush();
        }

        return $this->redirectToRoute('car_index');
    }

    /**
     * Creates a form to delete a car entity.
     *
     * @param Car $car The car entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Car $car)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('car_delete', array('id' => $car->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
