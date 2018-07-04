<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use AppBundle\Entity\Articulo;
use AppBundle\Entity\Categoria;



    /**
     * @Route("API")
     */
class DefaultController extends Controller

{

  
    /**
     * @Method("GET")
     * @Route("/Articulo", name="lista articulos")
     * 
     */
    public function getArticulosAction()
    {
        //$encoders=array(new XmlEncoder(),new Json Encoder());
        //$normalizers= array (new ObjectNormalizer());
        //$serializer = new Serializer($normalizers,$encoders);

        $em=$this->getDoctrine()->getManager();
        $articulos=$em->getRepository("AppBundle\Entity\Articulo")->findAll();

        //$jsonContent = $serializer->serialize($jugadores,'json');

        $jsonContent=$this->get('serializer')->serialize($articulos,'json');
        return new Response($jsonContent,200,array('Content-Type'=>'application/json'));
    }
      /**
     * @Method("GET")
     * @Route("/categorias", name="lista categorias")
     * 
     */
    public function getCategoriasAction()
    {
        //$encoders=array(new XmlEncoder(),new Json Encoder());
        //$normalizers= array (new ObjectNormalizer());
        //$serializer = new Serializer($normalizers,$encoders);

        $em=$this->getDoctrine()->getManager();
        $categorias=$em->getRepository("AppBundle\Entity\Categoria")->findAll();

        //$jsonContent = $serializer->serialize($jugadores,'json');

        $jsonContent=$this->get('serializer')->serialize($categorias,'json');
        return new Response($jsonContent,200,array('Content-Type'=>'application/json'));
    }

    /**
     * @Method("GET")
     * @route("/Articulo/buscarCadena/{cadena}",name="busca_articulo")
     * @return void
     */

    public function buscarArticulo($cadena)
    {
        
        
        $em=$this->get('doctrine.orm.entity_manager');
        if($cadena=="")
        {
            $dql = "SELECT a FROM AppBundle:Articulo a";
        }
        else
        {
            $dql = "SELECT a FROM AppBundle:Articulo a  WHERE a. descripcion like '%$cadena%'";
        }
        $query = $em->createQuery($dql)->getResult();
        $jsonContent=$this->get('serializer')->serialize($query,'json');
        return new Response($jsonContent,200,array('Content-Type'=>'application/json'));
    }

    /**
     * @Method("GET")
     * @Route("/Articulo/buscar/{id}", name="Articulo_id")
    */
    public function getArticuloId($id)
    {
        
        $em=$this->get('doctrine.orm.entity_manager');
        $query=$em->getRepository("AppBundle\Entity\Articulo")->find($id);
       //
        //$jsonContent = $serializer->serialize($jugadores,'json');

        $jsonContent=$this->get('serializer')->serialize($query,'json');
        return new Response($jsonContent,200,array('Content-Type'=>'application/json'));
    }
    
     /**
     * @Method("POST")
     * @Route("/Articulo/nuevo", name="jugador_nuevo")
    */
    public function nuevoArticuloAction(Request $request)
    {
        $articulo=new Articulo();
        if($request->headers->get("Content-Type")=="application/json")
        {
            $request=json_decode($request->getContent());



            $articulo->setDescripcion($request->descripcion);
            $articulo->setNumejemplar($request->numejemplar);
           // $articulo->setCategoriacategoria();
                
            $cat= $request->idcategoria;
            $categoria=$em->getRepository("AppBundle\Entity\Categoria")->find($cat);
            $articulo->setCategoriacategoria($categoria);
           
        }
        else
        {
            //estas lineas son para fortmato url-encode

            $articulo->setDescripcion($request->get('descripcion'));
            $articulo->setNumejemplar($request->get('numejemplar'));
            
            $cat= $request->get('idcategoria');
            $em=$this->get('doctrine.orm.entity_manager');
            
            $categoria=$em->getRepository("AppBundle\Entity\Categoria")->find($cat);
            $articulo->setCategoriacategoria($categoria);
        }
        $em=$this->getDoctrine()->getManager();
        $em->persist($articulo);
        $em->flush();


        return new Response(json_encode(["ok"=>Response::HTTP_OK]));
       // return new JsonResponse(array('status'=>'Articulo Creado'));
    }
    /**
     * @Method("POST")
     * @Route("/Articulo/modificar/{id}", name="edicion")
    */
    public function editarArticuloAction(Request $request,$id)
    {
        $em=$this->get('doctrine.orm.entity_manager');
        $articulo=$em->getRepository("AppBundle\Entity\Articulo")->find($id);
      

        if($request->headers->get("Content-Type")=="application/json")
        {
            $request=json_decode($request->getContent());



            $articulo->setDescripcion($request->descripcion);
            $articulo->setNumejemplar($request->numejemplar);
           // $articulo->setCategoriacategoria();
                
            $cat= $request->idcategoria;
            $categoria=$em->getRepository("AppBundle\Entity\Categoria")->find($cat);
            $articulo->setCategoriacategoria($categoria);
           
        }
        else
        {
            //estas lineas son para fortmato url-encode
          
            $articulo->setDescripcion($request->get('descripcion'));
            $articulo->setNumejemplar($request->get('numejemplar'));
            
            $cat= $request->get('idcategoria');
            
            
            $categoria=$em->getRepository("AppBundle\Entity\Categoria")->find($cat);
            $articulo->setCategoriacategoria($categoria);
        }
     
        
        $em->flush();
        return new Response(json_encode(["ok"=>Response::HTTP_OK]));
    }

    /**
     * @Method("DELETE")
     * @Route("/Articulo/borrar/{id}", name="Articulo id")
    */
    public function borrarArticuloId($id)
    {
        
        $em=$this->get('doctrine.orm.entity_manager');
        $articulo=$em->getRepository("AppBundle\Entity\Articulo")->find($id);
       //
        //$jsonContent = $serializer->serialize($jugadores,'json');
        $em->remove($articulo);
        $em->flush();
        return new Response(json_encode(["ok"=>Response::HTTP_OK]));
    }
    
}
