<?php

    namespace App\Controller;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\RedirectResponse;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\HttpFoundation\Session\SessionInterface;
    use Symfony\Component\Form\Extension\Core\Type\TextType;
    use Symfony\Component\Form\Extension\Core\Type\SubmitType;
    use Symfony\Component\Form\Extension\Core\Type\PasswordType;

    //Aquí incluimos la clase modelo
    use App\Entity\modelo;


    /** 
    * Clase que incluye los controladores de nuestra aplicación
    *
    * @author Álvaro Tapiador <alvarotapiador@gmail.com>
    * @version 1.0.0 Estable
    */
    class controladores extends AbstractController {

        /** 
        * Carga la lista de artículos al ingresar en la página principal
        *
        * @return array Renderiza en el documento la lista de artículos disponibles
        * @author Álvaro Tapiador <alvarotapiador@gmail.com>
        * @version 1.0.0 Estable
        * 
        * @Route("/tienda/public", name="index")
        */
        public function home() {
            $articulos = modelo::getArticulos();
            return $this -> render('articulos.twig', array('articulos' => $articulos) );
        }

        /** 
        * Carga el artículo a mostrar según el id facilitado
        *
        * @param string $id Identificador único del artículo
        * @return array Renderiza en el documento el artículos disponible según su id
        * @author Álvaro Tapiador <alvarotapiador@gmail.com>
        * @version 1.0.0 Estable
        * 
        * @Route("/tienda/public/articulo/{id}", name="articulo")
        */
        public function articulo($id) {
            $articulo = modelo::articulo($id);
            return $this->render('detalles_articulo.twig', array('articulo'=>$articulo));
        }

        /** 
        * Carga el formulario de registro en la tienda online
        *
        * @param Request Petición de formulario para registro
        * @return array Renderiza el formulario para registrarse en la web
        * @author Álvaro Tapiador <alvarotapiador@gmail.com>
        * @version 1.0.0 Estable
        * 
        * @Route("/tienda/public/registro", name="registro")
        */
        public function registro(Request $request) {   
            $form = $this->createFormBuilder()
            ->add('Alias', TextType::class)
            ->add('Email', TextType::class)
            ->add('Password', PasswordType::class)
            ->add('Enviar', SubmitType::class, array('label' => 'Enviar'))
            ->getForm();

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {			
                $datos = $form->getData();		
                $alias = $datos['Alias'];
                return $this->render('registro_correcto.twig', array('alias'=>$alias));
            }
        
            return $this->render('registro.twig', array('form' => $form->createView(),));
        }


        /** 
        * Carga el formulario de sugerencias en la tienda online
        *
        * @param Request Petición de formulario de sugerencias
        * @return array Renderiza el formulario para valorar las sugerencias de la web
        * @author Álvaro Tapiador <alvarotapiador@gmail.com>
        * @version 1.0.0 Estable
        * 
        * @Route("/tienda/public/sugerencias", name="sugerencias")
        */
        public function sugerencias(Request $request) {
            $sugerencias = modelo::sugerencias();

            $formulario = array(
                array('Observación: ', 'text', 'observacion', ''),
                array('', 'submit', 'valorar', 'Valorar')
            );
        
            if ($request->query->get('observacion')) {
                return new Response('<html><body>Grabar ' . $request->query->get('observacion') . '</body></html>');
            }

            return $this->render('sugerencias.twig', array('sugerencias' => $sugerencias, 'formulario' => $formulario));
        }

    }
?>