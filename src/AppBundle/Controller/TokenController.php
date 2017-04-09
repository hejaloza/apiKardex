<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Response;

class TokenController extends \Symfony\Bundle\FrameworkBundle\Controller\Controller {

    /**
     * @Route(path="/token-authentication", name="token_authentication")
     */
    public function tokenAuthentication(Request $request) {
        
        $data = json_decode($request->getContent(), true);
        $username = $data['username'];
        $password= $data['password'];

        $em = $this->getDoctrine()->getEntityManager();
        $user = $em->getRepository('AppBundle:Usuario')->findOneBy(array('usUsername' => $username));

        if (!$user) {
            //throw $this->createNotFoundException();
           // return new View("No existe Usuario", Response::HTTP_NOT_FOUND);
             $data = array('message' => 'No existe Usuario');
          //  $mensajeUsuario="No existe Usuario";
            return new JsonResponse($data,403);
          //   return $error='error usuario';
        }
        
        $user_password = $user->getUsPassword();
        if ($user_password != $password) {
           // throw $this->createAccessDeniedException();
        //    return new View("Password Incorrecta", Response::HTTP_NOT_FOUND);
             $data = array('message' => 'Password Incorrecta');
           // $mensajePassword="Password Incorrecta";
           // return new JsonResponse(['errorPassword' => $mensajePassword]);
             return new JsonResponse($data,403);
        }

        // Use LexikJWTAuthenticationBundle to create JWT token that hold only information about user name
        $token = $this->get('lexik_jwt_authentication.encoder')
                ->encode(['id_user' => $user->getusIdUsuario(),
                    'username' => $user->getusUsername(),
                    'exp' => time() + 3600 ]);// 1 hour expiration

        // Return genereted token
        return new JsonResponse(['token' => $token,'authentication'=>'correcta']);
    }

}
