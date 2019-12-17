<?php


namespace App\Controller;


use App\Entity\Plane;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;


class PlaneController extends AbstractController {

    public function displayPlanes() {
        $repository = $this->getDoctrine()->getRepository(Plane::class);
        return $this->json($repository->findAll());
    }

    public function getPlane($id) {
        $repository = $this->getDoctrine()->getRepository(Plane::class);
        return $this->json($repository->find($id));
    }

    public function createPlane(Request $request): Response {

        // you can fetch the EntityManager via $this->getDoctrine()
        // or you can add an argument to the action: createProduct(EntityManagerInterface $entityManager)
        $entityManager = $this->getDoctrine()->getManager();

        $plane = new Plane();
        $plane->setName($request->request->get('name'));
        $plane->setModel($request->request->get('model'));
        $plane->setCode($request->request->get('code'));
        $plane->setManufacturer($request->request->get('manufacturer'));

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($plane);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        return new Response('Saved new product with id '.$plane->getId());
    }


    public function update($id, Request $request) {
        $entityManager = $this->getDoctrine()->getManager();
        $plane = $entityManager->getRepository(Plane::class)->find($id);

        $plane->setName($request->request->get('name', $plane->getName()));
        $plane->setModel($request->request->get('model', $plane->getModel()));
        $plane->setManufacturer($request->request->get('manufacturer', $plane->getManufacturer()));
        $plane->setCode($request->request->get('code', $plane->getCode()));

        if (!$plane) {
            throw $this->createNotFoundException('No product found for id '.$id);
        }

        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $plane->getId()
        ]);
    }

    public function delete($id) {
        $entityManager = $this->getDoctrine()->getManager();

        $airport = $entityManager->getRepository(Plane::class)->find($id);
        if (!$airport) {
                throw $this->createNotFoundException('Aucun avion trouvé pour n°'.$id);
        }

        $entityManager->remove($airport);
        $entityManager->flush();

        return new Response('', [], 200);
    }

}