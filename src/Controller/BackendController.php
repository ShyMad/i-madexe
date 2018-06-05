<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class BackendController extends Controller
{
    /**
     * @Route("/backend", name="backend")
     */
    public function index()
    {
        return $this->render('backend/index.html.twig', [
            'controller_name' => 'BackendController',
        ]);
    }
    /**
     * @Route("/backend/formation", name="formation")
     */
    public function formation()
    {
        return $this->render('backend/formation.html.twig',[
            'controller_name' => 'BackendController',
        ]);
    }
}
