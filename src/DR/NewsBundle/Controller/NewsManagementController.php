<?php

namespace DR\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping\Id;


//imageCont
use DR\NewsBundle\Entity\News;
use DR\ImageBundle\Entity\ImageCont;
use DR\NewsBundle\Form\NewsType;
use DR\NewsBundle\Form\NewsDeleteType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;



class NewsManagementController extends Controller
{
	/**
	 * @Route("/tutorial", name="tutorial")
	 * @Security("has_role('ROLE_USER')")
	 *
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function tutorialPage()
	{
		return $this->render('DRNewsBundle:tutorial:index.html.twig');
	}
	/**
	 * @Route("/delete_news", name="delete_news")
	 * @Security("has_role('ROLE_USER')")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function deleteAllNews(Request $request)
	{
		
		$em = $this->getDoctrine()->getManager();

		$news = $em->getRepository('DRNewsBundle:News')->findAll();
		 
		$formDA= $this->createFormBuilder()
		->add('deleteall',      SubmitType::class, ['label' => 'Delete ALL News'])
		->getForm();
		
		$formD= $this->createFormBuilder(array('news'=>$news)) // form to Delete existing ones
		->add('news', CollectionType::class, array(
				'entry_type'   => NewsDeleteType::class,
				'allow_add'    => false,
				'allow_delete' => false,
				'required'       => true))
				->add('delete',      SubmitType::class, ['label' => 'Delete ticked News'])
				->getForm();
		
		$formD->handleRequest($request);		
		if ($formD->isSubmitted() && $formD->isValid())
		{
			$del_news_cont = $formD->getData();
			$delete_options=$del_news_cont['news'];
			$del=0;
			foreach($delete_options as $choice)
			{
				$news_ch=$choice->getToBeDeleted();
				if($news_ch)
				{
					$del++;
					$em->remove($choice);
				}
			}
			if ($del >0)
			{
				$em->flush();
				$this->addFlash('success', "Successfully deleted "."$del"." news");
				return $this->redirectToRoute('upload_news');
			}
			else 
			{
				return $this->redirectToRoute('delete_all_news');
			}
		
		}
		 
		$formDA->handleRequest($request);
		if ($formDA->isSubmitted() && $formDA->isValid() && $this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN'))
		{
			$em = $this->getDoctrine()->getManager();
			foreach($news as $a_news)
			{
				$em->remove($a_news);
			}
			$em->flush();
			$this->addFlash('success', 'Every news was deleted');
			 
			return $this->redirectToRoute('delete_all_news');
			 
		}

		return $this->render('DRNewsBundle:manage_news:index.html.twig',
				['formDA'=> $formDA->createView()
						,'formD'=> $formD->createView()
						, 'news'=>$news
				]);
	}
	 
	/**
	 * @Route("/upload_news", name="upload_news")
	 * @Security("has_role('ROLE_USER')")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function uploadNews(Request $request)
	{
		$a_news=new News();
		$em = $this->getDoctrine()->getManager();
		$news = $em->getRepository('DRNewsBundle:News')->findAll();


		$formA= $this->createForm(NewsType::class,$a_news);//form to Add new one
		$formA->handleRequest($request);				
		
		if ($formA->isSubmitted() && $formA->isValid())
		{
			$img_ne=$a_news->getImage();
			if($img_ne->getimage()==null)
			{
				$a_news->setImage(null);
				/*
				$pos_img = $em->getRepository('DRImageBundle:ImageCont')->findBy(['category' =>"default"]);
				$resultCount = count($pos_img);
				if($resultCount <1)
				{
					$a_news->setImage(null);// no choice there...
					$this->addFlash('success', 'coutn <1');
				}
				else
				{
					for ($i = 0; $i < $resultCount; $i++)
					{
						$a_news->setImage($pos_img[array_keys($pos_img)[$i]]);
					}
				}
				*/
			}		
			$em->persist($a_news);
			$em->flush();
			$this->addFlash('success', 'New news successfully added');
			 
			return $this->redirectToRoute('upload_news');
			 
		}
		return $this->render('DRNewsBundle:manage_news:index.html.twig',
				['formA'=> $formA->createView()
						, 'news'=>$news
						, 'a_news'=>$a_news
				]);
	}
	/**
	 * @Route("/modify_news/{id}", name="modify_news")
	 * @Security("has_role('ROLE_USER')")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function modifyNews(Request $request,News $a_news )
	{

		if($a_news->getImage() ==null)
		{
			$a_news->setImage(new ImageCont());
		}
		$formM= $this->createForm(NewsType::class,$a_news);
		$formM->handleRequest($request);		

		
		if ($formM->isSubmitted() && $formM->isValid())
		{
			$img_ne=$a_news->getImage();
			if($img_ne->getimage()==null && $img_ne->getImagename() ==null)
			{
				$a_news->setImage(null);
			}
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($a_news);
			$entityManager->flush();
			$this->addFlash('success', 'News successfully modified');
			 
			return $this->redirectToRoute('upload_news');
			 
		}
		return $this->render('DRNewsBundle:manage_news:show.html.twig',
				['formM'=> $formM->createView(),
				 'a_news'=>$a_news
				]);
	}
}
