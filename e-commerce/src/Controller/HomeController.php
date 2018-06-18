<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;


class HomeController
{
  /**
 * @Route("/")
 */
    public function homepage()
    {
       return new Response('first page already!');
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
