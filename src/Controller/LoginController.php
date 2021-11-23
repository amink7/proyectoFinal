<?php


namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\User;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login_route")
     */
    public function loginAction(AuthenticationUtils $authenticationUtils)
    {

        // obtener el error de login si hay
        $error = $authenticationUtils->getLastAuthenticationError();

        // último nombre de usuario introducido por el usuario
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'restaurante/login.html.twig',
            array(
                // last username entered by the user
                'last_username' => $lastUsername,
                'error'         => $error,
            )
        );
    }

    

    /**
     * @Route("/login_check", name="login_check")
     */
    public function loginCheckAction()
    {
        // este controller no se ejecutará,
        // ya que la route se maneja por el sistema de seguridad
    }

    
}