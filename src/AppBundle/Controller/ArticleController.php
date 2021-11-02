<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Article;
use AppBundle\Entity\Blog;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ArticleController extends Controller
{
    /**
     * @Route("/article/index", name="articles_index")
     */
    public function IndexAction()
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Article')
                ->findAll();

        return $this->render('article/index.html.twig',
            array('model'=>$model)
        );
    }

    /**
     * @Route("/article/detail/{id}", name="article_detail")
     */
    public function detailAction($id)
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Article')
                ->find($id);

        return $this->render('article/detail.html.twig',
            array('model'=>$model)
        );
    }

    /**
     * @Route("/article/edit/{id}", name="article_edit")
     */
    public function editAction(Request $request, $id)
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Article')
                ->find($id);

        $model->setName($model->getName());
        $model->setDescription($model->getDescription());
        $model->setBlog($model->getBlog());

        $form = $this->createFormBuilder($model)
                ->add('name', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Nombre'))
                ->add('date_published', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha publicación'))
                ->add('description', TextareaType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Descripción'))
                //->add('blog', ChoiceType::class, array('choices'=>array('Programacion'=>'1','Arquitectura'=>'2','Ingenieria'=>'3','Diseño'=>'4','Testing'=>'5'), 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Blog'))
                ->add('blog', EntityType::class, array('class'=>'AppBundle:Blog', 'choice_label'=>'name', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Blog'))                
                ->getForm();
        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('article/edit.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/article/delete/{id}", name="article_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository('AppBundle:Article')->find($id);

        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('articles_index');
    }

    /**
     * @Route("/article/create", name="article_create")
     */
    public function createAction(Request $request)
    {
        $model = new Article();

        $form = $this->createFormBuilder($model)
                ->add('name', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Nombre'))
                ->add('date_published', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Fecha publicación'))                
                ->add('description', TextareaType::class, array('attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Descripción'))
                ->add('blog', EntityType::class, array('class'=>'AppBundle:Blog', 'choice_label'=>'name', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Blog'))
                ->getForm();

        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($model);
            $em->flush();

            return $this->redirectToRoute('articles_index');
        }

        return $this->render('article/create.html.twig', array('form'=>$form->createView()));
        
    }
}