<?php


namespace App\Controller;

use App\Entity\User;
use App\Services\Normalizer\UserSerializer;
use phpDocumentor\Reflection\Types\Array_;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController {

    /**
     * @param $lastName
     * @param $firstName
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function displayUser($lastName, $firstName) {
        $user = new User(1, $firstName, $lastName, "2000-05-05", "2019-12-11");
        return $this->json([
            'lastName' => $user->getLastName(),
            'firstName' => $user->getFirstname()
        ]);
    }

    public function displayUserList() {

        $users = [
            new User(1, "Michel", "Sardoux", "2009-10-19", "2010-10-11"),
            new User(2, "Michelle", "Sardoux", "2009-10-19", "2010-10-11"),
            new User(3, "Michele", "Sardoux", "2009-10-19", "2010-10-11"),
            new User(4, "Miche", "Sardoux", "2009-10-19", "2010-10-11")
        ];

        return $this->json($users);

    }

}