<?php


namespace App\Controller;


use App\Entity\Flight;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class FlightController extends AbstractController {

    public function displayFlights() {
        $repository = $this->getDoctrine()->getRepository(Flight::class);
        return $this->json($repository->findAll());
    }

    public function getFlight($id) {
        $repository = $this->getDoctrine()->getRepository(Flight::class);
        return $this->json($repository->find($id));
    }

    public function delete($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $airport = $entityManager->getRepository(Flight::class)->find($id);
        if (!$airport) {
            throw $this->createNotFoundException('Aucun vol trouvé pour n°'.$id);
        }

        $entityManager->remove($airport);
        $entityManager->flush();

        return new Response('', [], 200);
    }
}