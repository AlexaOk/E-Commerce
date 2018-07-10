<?php

namespace App\Controller;

use App\Entity\ProductDetails;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HomeController extends Controller
{
    /**
     * @Route("/", name="home")
     */
    public function index()
    {

        $productDetails = $this->getDoctrine()->getRepository(ProductDetails::class);
        $list_productDetails = $productDetails->findBy(['new' => true], null, 4);
        
        if(empty($list_productDetails)){
            $list_productDetails = $productDetails->findBy([],null,4);
        }

        dump($list_productDetails);

        return $this->render('home/index.html.twig', [
            'list_productDetails' => $list_productDetails,
            'controller_name' => 'HomeController',
        ]);
    }
}
