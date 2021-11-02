<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Actividades;
use AppBundle\Entity\Departamentos;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ActividadesController extends Controller
{
    /**
     * @Route("/actividades/index", name="Actividades_index")
     */
    public function IndexAction()
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Actividades')
                ->findAll();

        return $this->render('Actividades/index.html.twig',
            array('model'=>$model)
        );
    }

    /**
     * @Route("/actividades/detail/{id}", name="Actividades_detail")
     */
    public function detailAction($id)
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Actividades')
                ->find($id);

        return $this->render('Actividades/detail.html.twig',
            array('model'=>$model)
        );
    }

    /**
     * @Route("/actividades/edit/{id}", name="Actividades_edit", requirements={"id" = "\d+"})
     */
    public function editAction(Request $request, $id)
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Actividades')
                ->find($id);

        $model->setTitulo($model->getTitulo());
        $model->setSinopsis($model->getSinopsis());
        $model->setObjetivo($model->getObjetivo());
        $model->setDepartamento($model->getDepartamento());
        $model->setOrganismo($model->getOrganismo());
        $model->setCoordinador($model->getCoordinador());
        $model->setGrado($model->getGrado());
        $model->setModalidad($model->getModalidad());
        $model->setForma($model->getForma());
        $model->setDirigido($model->getDirigido());
        $model->setCantidad($model->getCantidad());
        $model->setCalendario($model->getCalendario());
        $model->setHoraInicio($model->getHoraInicio());
        $model->setHoraFin($model->getHoraFin());
        $model->setTotalHoras($model->getTotalHoras());
        $model->setHorasLectivas($model->getHorasLectivas());
        $model->setCreditos($model->getCreditos());
        $model->setPeriodo($model->getPeriodo());
        $model->setMatricula($model->getMatricula());
        $model->setLugar($model->getLugar());
        $model->setEntidad($model->getEntidad());


        $form = $this->createFormBuilder($model)
                ->add('titulo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Título'))
                ->add('fechaInicio', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha inicio'))
                ->add('fechaFin', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha fin'))
                ->add('sinopsis', TextareaType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Sinopsis'))
                ->add('objetivo', TextareaType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Objetivo'))
                ->add('departamento', EntityType::class, array(
                    'class'=>'AppBundle:Departamentos', 
                    'query_builder'=>function ($er) {return $er->createQueryBuilder('u')->where('u.facultad  = :cod_facultad')->setParameter('cod_facultad', '1');}, 
                    'choice_label'=>'departamento', 
                    'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Departamento'))
                ->add('organismo', EntityType::class, array('class'=>'AppBundle:Organismos', 'choice_label'=>'organismo', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Organismo'))
                ->add('coordinador', EntityType::class, array('class'=>'AppBundle:Coordinadores', 'choice_label'=>'coordinador', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Coordinador'))
                ->add('grado', ChoiceType::class, array('choices'=>array('PRESENCIAL'=>'PRESENCIAL','SEMI-PRESENCIAL'=>'SEMI-PRESENCIAL','A DISTANCIA'=>'A DISTANCIA'), 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Grado'))
                ->add('modalidad', ChoiceType::class, array('choices'=>array('Tiempo Parcial'=>'Tiempo Parcial','Tiempo Completo'=>'Tiempo Completo'), 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Modalidad'))
                ->add('forma', ChoiceType::class, array('choices'=>array(
                    'Doctorado'=>'Doctorado',
                    'Maestría'=>'Maestría',
                    'Especialidad'=>'Especialidad',
                    'Diplomado'=>'Diplomado',
                    'Curso'=>'Curso',
                    'Entrenamiento'=>'Entrenamiento',
                    'Conferencia'=>'Conferencia',
                    'Taller'=>'Taller'
                    ), 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Forma'))
                ->add('dirigido', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Dirigido a'))
                ->add('cantidad', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Cantidad'))
                ->add('calendario', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Calendario'))
                ->add('horaInicio', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Hora Inicio'))
                ->add('horaFin', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Hora Fin'))
                ->add('totalHoras', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Total de horas'))
                ->add('horasLectivas', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Horas Lectivas'))
                ->add('creditos', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Créditos'))
                ->add('periodo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Período'))
                ->add('matricula', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Matrícula'))
                ->add('lugar', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Lugar'))
                ->add('entidad', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Entidad'))
                ->getForm();
        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('Actividades_index');
        }

        return $this->render('Actividades/edit.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/actividades/delete/{id}", name="Actividades_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository('AppBundle:Actividades')->find($id);

        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('Actividades_index');
    }

    /**
     * @Route("/actividades/create", name="Actividades_create")
     */
    public function createAction(Request $request)
    {
        $model = new Actividades();

        $form = $this->createFormBuilder($model)
                ->add('titulo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Título'))
                ->add('fechaInicio', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha inicio'))
                ->add('fechaFin', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha fin'))                
                ->add('sinopsis', TextareaType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Sinopsis'))
                ->add('objetivo', TextareaType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Objetivo'))                
                ->add('departamento', EntityType::class, array(
                    'class'=>'AppBundle:Departamentos', 
                    'query_builder'=>function ($er) {return $er->createQueryBuilder('u')->where('u.facultad  = :cod_facultad')->setParameter('cod_facultad', '1');}, 
                    'choice_label'=>'departamento', 
                    'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Departamento'))                
                ->add('organismo', EntityType::class, array('class'=>'AppBundle:Organismos', 'choice_label'=>'organismo', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Organismo'))
                ->add('coordinador', EntityType::class, array('class'=>'AppBundle:Coordinadores', 'choice_label'=>'coordinador', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Coordinador'))
                ->add('grado', ChoiceType::class, array('choices'=>array('PRESENCIAL'=>'PRESENCIAL','SEMI-PRESENCIAL'=>'SEMI-PRESENCIAL','A DISTANCIA'=>'A DISTANCIA'), 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Grado'))
                ->add('modalidad', ChoiceType::class, array('choices'=>array('Tiempo Parcial'=>'Tiempo Parcial','Tiempo Completo'=>'Tiempo Completo'), 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Modalidad'))
                ->add('forma', ChoiceType::class, array('choices'=>array(
                    'Doctorado'=>'Doctorado',
                    'Maestría'=>'Maestría',
                    'Especialidad'=>'Especialidad',
                    'Diplomado'=>'Diplomado',
                    'Curso'=>'Curso',
                    'Entrenamiento'=>'Entrenamiento',
                    'Conferencia'=>'Conferencia',
                    'Taller'=>'Taller'
                    ), 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Forma'))
                ->add('dirigido', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Dirigido a'))
                ->add('cantidad', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Cantidad'))
                ->add('calendario', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Calendario'))
                ->add('horaInicio', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Hora Inicio'))
                ->add('horaFin', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Hora Fin'))
                ->add('totalHoras', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Total de horas'))
                ->add('horasLectivas', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Horas Lectivas'))
                ->add('creditos', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Créditos'))
                ->add('periodo', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Período'))
                ->add('matricula', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Matrícula'))
                ->add('lugar', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Lugar'))     
                ->add('entidad', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Entidad'))                           
                ->getForm();

        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($model);
            $em->flush();

            return $this->redirectToRoute('Actividades_index');
        }

        return $this->render('Actividades/create.html.twig', array('form'=>$form->createView()));
        
    }
}