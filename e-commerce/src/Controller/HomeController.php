<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class HomeController
{
  /**
 * @Route("/")
 */
    public function index()
    {
        return new Response('products/show.html.twig');
    }
    /**
     * @Route("/news/{slug}")
     */
    public function show($slug)
    {
        return new Response(sprintf(
            'title: "%s"',
            $slug
        ));
    }
}
