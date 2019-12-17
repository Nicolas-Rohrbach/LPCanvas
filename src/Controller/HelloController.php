<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HelloController extends AbstractController {

    public function helloAction() {
        return $this->json([
            'message' => 'Meme pas généré automatiquement :)',
        ]);
    }

    public function onlyNumberAction($number) {
        return $this->json([
            'MonBeauNombre' => $number,
        ]);
    }

    public function putAction() {
        return $this->json([
            'message' => 'Meme pas généré automatiquement :)',
        ]);
    }
}
