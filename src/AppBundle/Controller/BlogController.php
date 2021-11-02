<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Blog;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class BlogController extends Controller
{
    /**
     * @Route("/blog/index", name="blogs_index")
     */
    public function IndexAction()
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Blog')
                ->findAll();

        return $this->render('blog/index.html.twig',
            array('model'=>$model)
        );
    }

    /**
     * @Route("/blog/delete/{id}", name="blog_delete")
     */
    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $model = $em->getRepository('AppBundle:Blog')->find($id);

        $em->remove($model);
        $em->flush();

        return $this->redirectToRoute('blogs_index');
    }

    /**
     * @Route("/blog/create", name="blog_create")
     */
    public function createAction(Request $request)
    {
        $model = new Blog();

        $form = $this->createFormBuilder($model)
                ->add('name', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Nombre'))
                ->add('user', EntityType::class, array('class'=>'AppBundle:User', 'choice_label'=>'username', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Usuario'))
                ->getForm();

        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->persist($model);
            $em->flush();

            return $this->redirectToRoute('blogs_index');
        }

        return $this->render('blog/create.html.twig', array('form'=>$form->createView()));
    }

    /**
     * @Route("/blog/edit/{id}", name="blog_edit")
     */
    public function editAction(Request $request, $id)
    {
        $model = $this->getDoctrine()
                ->getRepository('AppBundle:Blog')
                ->find($id);

        $model->setName($model->getName());
        $model->setUser($model->getUser());

        $form = $this->createFormBuilder($model)
                ->add('name', TextType::class, array('attr'=> array('class'=>'form-control', 'style'=>'margin-bottom:15px'),'label'=>'Nombre'))
                ->add('user', EntityType::class, array('class'=>'AppBundle:User', 'choice_label'=>'username', 'attr'=>array('class'=>'form-control', 'style'=>'margin-bottom:15px'), 'label'=>'Usuario'))
                ->getForm();
        $form->HandleRequest($request);

        if($form->isSubmitted() && $form->isValid()){
            $em = $this->getDoctrine()->getManager();
            $em->flush();

            return $this->redirectToRoute('blogs_index');
        }

        return $this->render('blog/edit.html.twig', array('form'=>$form->createView()));
    }


}