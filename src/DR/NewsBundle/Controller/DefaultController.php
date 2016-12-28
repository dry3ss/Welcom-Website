<?php

namespace DR\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\Mapping\Id;


//imageCont
use DR\ImageBundle\Entity\ImageCont;
use DR\NewsBundle\Entity\News;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Length;



class DefaultController extends Controller
{
	
	
	

	/* Gets the database of type $type and searches for the category named $catagory inside,
	 * sort the elements by $rank_by, then constructs an ordered array, treating specially the tri-news
	 * that can be identified using ->$getter()  
	 * */
	public function createDisplayOrder($category,$type="News", $rank_by="ordernumber", $getter="getPartoftrinews")
	{
		$repository = $this
		->getDoctrine()
		->getManager()
		->getRepository('DRNewsBundle:'.$type);
		 
		$raw_list_news = $repository->findBy(
				array('category' => $category), // Criteria
				array($rank_by => 'asc'));        // sort
				$number_in_tri=0;//the indice of this news in the tri-news array
				$global_order=0;//the indice of this news/newsarray in the returned array
				$res_container=array();//the returned array
				$key="";//the key used for each news in whichever array
				$tri_container=array();//the array (passed by copy) holding each 
				$ordernumber;
				$old_ordernumber;
				foreach($raw_list_news as $a_news)
				{
					
					$ordernumber=$a_news->getOrderNumber();
					if($global_order==0)//if we are at the start we still have to initialise it
						$old_ordernumber=$ordernumber;
					
					$isTriNews=$a_news->$getter();// check if it's a part of a "tri news" 
					if(!$isTriNews )//if not we do very little
					{
						if(count($tri_container)>0)//if we had a not-empty tri_container we have to
						//push it in the res
						{
							$key="t" . $global_order;
							$res_container[$key]=$tri_container;
						}
						$tri_container=array();//flush our container, note that arrays are
						//assigned by copy in PHP not reference, so no pb here
						$number_in_tri=0;
						$global_order++;
						
					}
					else
					{
						if( $number_in_tri>=3 ||$number_in_tri==0 || $ordernumber !=$old_ordernumber)//if we are at the start of a new tri-news
						{
							if(count($tri_container)>0)
							//if we had a not-empty tri_container we have to
							//push it in the res
							{
								$key="t" . $global_order;
								$res_container[$key]=$tri_container;
							}
							$tri_container=array();//flush our container, note that arrays are
							//assigned by copy in PHP not reference, so no pb here
							$number_in_tri=1;
							$global_order++;
						}
						else
							$number_in_tri++;
					}
					if($isTriNews)//then we add to our $tri_container 
					{
						$key="t" ."_".$number_in_tri;
						$tri_container[$key]=$a_news;
					}
					else //we just add our news to the array
					{
						$key="n" . $global_order;
						$res_container[$key]=$a_news;
					}
					$old_ordernumber=$ordernumber;					
					
				}
				if(count($tri_container)>0)//if we had a not-empty tri_container we have to
				//push it in the res
				{
					$key="t" . $global_order;
					$res_container[$key]=$tri_container;
				}
				dump($res_container);
				return $res_container;
	
	
	}
	
	
	
	
    /**
     * @Route("/", name="home")
	 * @param Request $request
	 * @return \Symfony\Component\HttpFoundation\Response 
     */
    public function homeAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$news_bar = $em->getRepository('DRNewsBundle:News')->findLike();
    	
    	$news=self::createDisplayOrder("home");
    	
    	
        return $this->render('DRNewsBundle:home:index.html.twig', ['news'=>$news,
        															'newsbar'=>$news_bar
        															]);
    }
    
    /**
     * @Route("/campus", name="campus")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function campusAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$news=self::createDisplayOrder("campus");
    	$news_bar = $em->getRepository('DRNewsBundle:News')->findOneBy(
    			['category' => 'main_campus' ]);
    
    	return $this->render('DRNewsBundle:campus:index.html.twig', ['news'=>$news,
    			'newsbar'=>$news_bar
    	]);
    }
    /**
     * @Route("/housing", name="housing")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function housingAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$news=self::createDisplayOrder("housing");
    	$news_bar = $em->getRepository('DRNewsBundle:News')->findOneBy(
    			['category' => 'main_housing' ]);
    
    	return $this->render('DRNewsBundle:housing:index.html.twig', ['news'=>$news,
    			'newsbar'=>$news_bar
    	]);
    }
    
    /**
     * @Route("/lifeinfrance", name="lif")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function lifAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$news=self::createDisplayOrder("LIF");
    	$news_bar = $em->getRepository('DRNewsBundle:News')->findOneBy(
    			['category' => 'main_LIF' ]);
    
    	return $this->render('DRNewsBundle:lif:index.html.twig', ['news'=>$news,
    			'newsbar'=>$news_bar
    	]);
    }

    
    /**
     * @Route("/help", name="help")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function eventAction(Request $request)
    {
    	$em = $this->getDoctrine()->getManager();
    	$news=self::createDisplayOrder("help");
    	$news_bar = $em->getRepository('DRNewsBundle:News')->findOneBy(
    			['category' => 'img_help' ]);
    
    	return $this->render('DRNewsBundle:help:index.html.twig', ['news'=>$news,
    			'newsbar'=>$news_bar
    	]);
    }

    
}
