<?php

namespace App\Controller;

use App\Entity\Products;
use App\Form\ProductsType;
use App\Repository\CategoriesRepository;
use App\Repository\ProductDetailsRepository;
use App\Repository\ProductsRepository;
use App\Repository\SubCategoriesRepository;
use App\Repository\VariantOptionsRepository;
use App\Repository\VariantsRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/products")
*/
class ProductsController extends Controller
{
   /**
    * @Route("/", name="products_index", methods="GET")
    */
   public function index(ProductsRepository $productsRepository, CategoriesRepository $categoriesRepository, SubCategoriesRepository $subCategoriesRepository, ProductDetailsRepository $productDetailsRepository): Response
   {
       return $this->render('products/index.html.twig',
           ['products' => $productsRepository->findAll(),
            'categories' => $categoriesRepository->findAll(),
            'subcategories' => $subCategoriesRepository->findAll(),

       ]);
   }

//    /**
//     * @Route("/new", name="products_new", methods="GET|POST")
//     */
//    public function new(Request $request): Response
//    {
//        $product = new Products();
//        $form = $this->createForm(ProductsType::class, $product);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $em = $this->getDoctrine()->getManager();
//            $em->persist($product);
//            $em->flush();
//
//            return $this->redirectToRoute('products_index');
//        }
//
//        return $this->render('products/new.html.twig', [
//            'product' => $product,
//            'form' => $form->createView(),
//        ]);
//    }

   /**
    * @Route("/{category}/{sub_category}/{id}", name="products_show", methods="GET")
    * @ParamConverter("category", options={"mapping": {"category_name" : "name"}})
    * @ParamConverter("sub_category", options={"mapping": {"sub_category_name" : "name"}})
    */
   public function show(Products $product, CategoriesRepository $categoriesRepository, ProductDetailsRepository $productDetailsRepository, SubCategoriesRepository $subCategoriesRepository, VariantsRepository $variantsRepository, VariantOptionsRepository $variantOptionsRepository): Response
   {
       $productDetails = $product->getProductDetails();
       $variantOptions = $variantOptionsRepository->findBy(array('productDetails' => $productDetails->getValues()));
       dump($variantOptions);

       return $this->render('products/show.html.twig', [
           'product' => $product,
           'categories' => $categoriesRepository->findAll(),
           'subcategories' => $subCategoriesRepository->findAll(),
           'productDetails' => $productDetails,
       ]);
   }

//    /**
//     * @Route("/{id}/edit", name="products_edit", methods="GET|POST")
//     */
//    public function edit(Request $request, Products $product): Response
//    {
//        $form = $this->createForm(ProductsType::class, $product);
//        $form->handleRequest($request);
//
//        if ($form->isSubmitted() && $form->isValid()) {
//            $this->getDoctrine()->getManager()->flush();
//
//            return $this->redirectToRoute('products_edit', ['id' => $product->getId()]);
//        }
//
//        return $this->render('products/edit.html.twig', [
//            'product' => $product,
//            'form' => $form->createView(),
//        ]);
//    }
//
//    /**
//     * @Route("/{id}", name="products_delete", methods="DELETE")
//     */
//    public function delete(Request $request, Products $product): Response
//    {
//        if ($this->isCsrfTokenValid('delete'.$product->getId(), $request->request->get('_token'))) {
//            $em = $this->getDoctrine()->getManager();
//            $em->remove($product);
//            $em->flush();
//        }
//
//        return $this->redirectToRoute('products_index');
//    }
}
