<?php

namespace DR\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping\Id;


//imageCont
use DR\ImageBundle\Entity\ImageCont;
use DR\ImageBundle\Form\ImageContType;
use DR\ImageBundle\Form\ImageContEditType;
use DR\ImageBundle\Form\ImageContDeleteType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;



class ImageManagementController extends Controller
{

	/**
	 * @Route("/delete_imgs", name="delete_img")
	 * @Security("has_role('ROLE_USER')")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function deleteAllImages(Request $request)
	{
		$em = $this->getDoctrine()->getManager();

		$images = $em->getRepository('DRImageBundle:ImageCont')->findAll();
		 
		$formDA= $this->createFormBuilder()
		->add('deleteall',      SubmitType::class, ['label' => 'Delete ALL imgs'])
		->getForm();
		
		$formD= $this->createFormBuilder(array('imgs'=>$images)) // form to Delete existing ones
		->add('imgs', CollectionType::class, array(
				'entry_type'   => ImageContDeleteType::class,
				'allow_add'    => false,
				'allow_delete' => false,
				'required'       => true))
				->add('delete',      SubmitType::class , ['label' => 'Delete ticked imgs'])
				->getForm();
		
		$formD->handleRequest($request);
		$formDA->handleRequest($request);
			
		if ($formDA->isSubmitted() && $formDA->isValid()&& $this->get('security.authorization_checker')->isGranted('ROLE_SUPER_ADMIN'))
		{
			foreach($images as $img)
			{
				if($img->getCategory() !="default")//we do not delete it if its the case !
				{
					$mod_news=$img->getNews();
					if($mod_news !=null)
					{
						$mod_news->setImage(null);
						$em->persist($mod_news);					
					}
					$em->remove($img);
				}
					
			}
			$em->flush();
			$this->addFlash('success', 'Every (not default) image was deleted');
				
			return $this->redirectToRoute('delete_all_img');			
		}
		if ($formD->isSubmitted() && $formD->isValid())
		{
			$del_img_cont = $formD->getData();
			$delete_options=$del_img_cont['imgs'];
			$del=0;
			foreach($delete_options as $choice)
			{
				$img_ch=$choice->getToBeDeleted();
				if($img_ch)
				{
					$del++;
					$mod_news=$choice->getNews();
					if($mod_news !=null)
					{
						$mod_news->setImage(null);
						$em->persist($mod_news);
					}
					$em->remove($choice);
				}
			}
			if ($del >0)
			{
				$em->flush();
				$this->addFlash('success', "Successfully deleted "."$del"." imgs");
				return $this->redirectToRoute('delete_all_img');
			}
			else
			{
				$this->addFlash('success', "No img deleted");
				return $this->redirectToRoute('delete_all_img');
			}
		
		}

		return $this->render('DRNewsBundle:manage_img:index.html.twig',
				['formDA'=> $formDA->createView()
						,'formD'=> $formD->createView()
						, 'images'=>$images
				]);
	}
	 
	/**
	 * @Route("/upload_img", name="upload_img")
	 * @Security("has_role('ROLE_USER')")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function uploadImage(Request $request)
	{
		$image=new Imagecont();
		$em = $this->getDoctrine()->getManager();
		$images = $em->getRepository('DRImageBundle:ImageCont')->findAll();
		
		$formA= $this->createForm(ImageContType::class,$image);// form to Add new images
		$formA->handleRequest($request);		


		if ($formA->isSubmitted() && $formA->isValid())
		{
			$em->persist($image);
			$em->flush();
			$this->addFlash('success', 'New image successfully added');
			
			return $this->redirectToRoute('modify_img', ['id'=>$image->getId()]);			 
		}
		return $this->render('DRNewsBundle:manage_img:index.html.twig',
				['formA'=> $formA->createView()
						, 'images'=>$images
				]);
	}
	/**
	 * @Route("/modify_img/{id}", name="modify_img")
	 * @Security("has_role('ROLE_USER')")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response
	 */
	public function modifyImage(Request $request,ImageCont $image )
	{
		$formM= $this->createForm(ImageContEditType::class,$image);
		$formM->handleRequest($request);
		if ($formM->isSubmitted() && $formM->isValid())
		{
			$entityManager = $this->getDoctrine()->getManager();
			$entityManager->persist($image);
			$entityManager->flush();
			$this->addFlash('success', 'Image successfully modified');
			 
			return $this->redirectToRoute('upload_img');
			 
		}
		return $this->render('DRNewsBundle:manage_img:show.html.twig',
				['formM'=> $formM->createView()
						,'img'=>$image
				]);
	}
}
