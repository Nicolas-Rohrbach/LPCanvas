<?php


namespace App\Controller;


use App\Entity\Pilot;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class PilotController extends AbstractController {

    public function displayPilots() {
        $repository = $this->getDoctrine()->getRepository(Pilot::class);
        return $this->json($repository->findAll());
    }

    public function getPilot($id) {
        $repository = $this->getDoctrine()->getRepository(Pilot::class);
        return $this->json($repository->find($id));
    }

    public function delete($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $airport = $entityManager->getRepository(Pilot::class)->find($id);
        if (!$airport) {
            throw $this->createNotFoundException('Aucun avion trouvé pour n°'.$id);
        }

        $entityManager->remove($airport);
        $entityManager->flush();

        return new Response('', [], 200);
    }

}