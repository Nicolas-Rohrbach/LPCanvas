<?php


namespace App\Controller;


use App\Entity\Airport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class AirportController extends AbstractController {


    public function displayAirports() {
        $repository = $this->getDoctrine()->getRepository(Airport::class);
        return $this->json($repository->findAll());
    }

    public function getAirport($id) {
        $repository = $this->getDoctrine()->getRepository(Airport::class);
        return $this->json($repository->find($id));
    }

    public function update($id) {
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Airport::class)->find($id);

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }

        $product->setName('New product name!');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);
    }

    public function deleteAirport($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $airport = $entityManager->getRepository(Airport::class)->find($id);
        if (!$airport) {
            throw $this->createNotFoundException('Aucun aéroport trouvé pour n°'.$id);
        }

        $entityManager->remove($airport);
        $entityManager->flush();

        return new Response('', [], 200);
    }

}