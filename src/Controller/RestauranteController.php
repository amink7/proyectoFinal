<?php
// src/Controller/SorteoController.php
namespace App\Controller;

use App\Form\OfertaType;
use App\Entity\Oferta;
use App\Form\PlatoType;
use App\Form\UserType;
use App\Entity\Plato;
use App\Entity\User;
use App\Form\CategoriaType;
use App\Entity\Categorias;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class RestauranteController extends AbstractController
{
    public function index()
    {
        return $this->render('restaurante/index.html.twig');
    }

    public function carta()
    {
        $repository = $this->getDoctrine()->getRepository('App:Categorias');
        $categorias = $repository->findAll();
        return $this->render('restaurante/admin/carta.html.twig',array('categorias'=>$categorias));
    }

    public function cartacliente()
    {
      $repository = $this->getDoctrine()->getRepository('App:Categorias');
      $categorias = $repository->findAll();
      return $this->render('restaurante/admin/carta.html.twig',array('categorias'=>$categorias));
    }

    public function platounico($idPlato)
    {
      $repository = $this->getDoctrine()->getRepository('App:Plato');
      $plato = $repository->find($idPlato);

        return $this->render('restaurante/admin/carta.html.twig',array('plato'=>$plato));
    }

    public function introducirPlato(Request $request)
    {
      $plato = new Plato();
      $form = $this->createForm(PlatoType::class);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $plato = $form->getData();

          $em = $this->getDoctrine()->getManager();
          $em->persist($plato);
          $em->flush();
          return $this->redirectToRoute('carta');
      }

        return $this->render('restaurante/admin/introducirPlato.html.twig',array('form'=> $form->createView()));
    }

    public function actualizarPlato(Request $request, $idPlato)
    {
      $em = $this->getDoctrine()->getManager();
      $plato = $em->getRepository(Plato::Class)->find($idPlato);
      $form = $this->createForm(PlatoType::class, $plato);

      $form->handleRequest($request);
    if ($form->isSubmitted() && $form->isValid()) {

        $plato = $form->getData();
        $em->persist($plato);
        $em->flush();
        return $this->redirectToRoute('carta');
      }

    return $this->render('restaurante/admin/actualizarPlato.html.twig', array('form'=> $form->createView()));
    }

    public function eliminarPlato($idPlato)
    {
      $em = $this->getDoctrine()->getManager();
      $plato = $em->getRepository(Plato::Class)->find($idPlato);
      if (!$apuesta){
        throw $this->createNotFoundException(
            'No existe ningun plato con id '.$idPlato
        );
    }
      $em->remove($plato);
      $em->flush();

      return $this->redirectToRoute('carta');
    }

    public function control()
    {
        return $this->render('restaurante/admin/panelcontrol.html.twig');
    }
    

    public function introducirCategoria(Request $request)
    {
      $categoria = new Categorias();
      $form = $this->createForm(CategoriaType::class);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $categoria = $form->getData();

          $em = $this->getDoctrine()->getManager();
          $em->persist($categoria);
          $em->flush();

      }

        return $this->render('restaurante/admin/introducirCategoria.html.twig',array('form'=> $form->createView()));
    }

    public function introducirOferta(Request $request)
    {
      $oferta = new Oferta();
      $form = $this->createForm(OfertaType::class);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
          $oferta = $form->getData();

          $em = $this->getDoctrine()->getManager();
          $em->persist($oferta);
          $em->flush();

      }

        return $this->render('restaurante/admin/introducirOferta.html.twig',array('form'=> $form->createView()));
    }

    
}