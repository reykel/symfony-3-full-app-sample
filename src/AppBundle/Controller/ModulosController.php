<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Modulos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ModulosController extends Controller
{
    /**
     * @Route("/modulos/index/{id}", name="Modulos_index")
     */
    public function indexAction($id)
    {
        $model = $this->getDoctrine()
                    ->getRepository('AppBundle:Modulos')
                    ->findByActividad($id);

        return $this->render('modulos/index.html.twig', 
            array('model' => $model, 'id'=>$id)
        );
    }

    /**
     * @Route("/modulos/detail/{id}", name="Modulos_detail")
     */
    public function detailAction($id)
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Modulos')
                ->find($id);

        return $this->render('Modulos/detail.html.twig',
            array('model'=>$model)
        );
    }

    /**
     * @Route("/modulos/edit/{id}", name="Modulos_edit")
     */
    public function editAction(Request $request, $id)
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Modulos')
                ->find($id);

        $model->setTitulo($model->getTitulo());
        $model->setFechaInicio($model->getFechaInicio());
        $model->setFechaFin($model->getFechaFin());
        $model->setHorasTotal($model->getHorasTotal());
        $model->setHorasLectivas($model->getHorasLectivas());
        $model->setProfesor($model->getProfesor());
        $model->setCorreo($model->getCorreo());

        $form = $this->createFormBuilder($model)
                ->add('titulo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Título'))
                ->add('fechaInicio', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha inicio'))
                ->add('fechaFin', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha fin'))
                ->add('horasTotal', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Total de horas'))
                ->add('horasLectivas', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Horas Lectivas'))
                ->add('profesor', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Profesor'))
                ->add('correo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Correo'))                
                ->getForm();
        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('Modulos_index', array('id'=>$model->getActividad_id()));
        }

        return $this->render('Modulos/edit.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/modulos/delete/{id}/{_retorno}", name="Modulos_delete")
     */
    public function deleteAction($id, $_retorno)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository('AppBundle:Modulos')->find($id);

        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('Modulos_index', array('id'=>$_retorno));
    }

    /**
     * @Route("/modulos/create/{id}", name="Modulos_create")
     */
    public function createAction(Request $request, $id)
    {
        $model = new Modulos();
        $actividad_model = $this->getDoctrine()->getRepository('AppBundle:Actividades')->find($id);
        $model->setActividad($actividad_model);

        $form = $this->createFormBuilder($model)
                ->add('titulo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Título'))
                ->add('fechaInicio', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha inicio'))
                ->add('fechaFin', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha fin'))                
                ->add('horasTotal', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Total de horas'))
                ->add('horasLectivas', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Horas Lectivas'))
                ->add('profesor', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Profesor'))
                ->add('correo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Correo'))
                ->getForm();

        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($model);
            $em->flush();

            return $this->redirectToRoute('Modulos_index', array('id'=>$id));
        }

        return $this->render('Modulos/create.html.twig', array('form'=>$form->createView()));
    }
}
