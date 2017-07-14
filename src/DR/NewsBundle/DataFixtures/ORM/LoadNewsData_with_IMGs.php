<?php

namespace DR\NewsBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use DR\NewsBundle\Entity\News;
use DR\ImageBundle\Entity\ImageCont;

class LoadNewsData implements FixtureInterface
{
	public function load(ObjectManager $manager)
	{
		$newsContainer= array();
		$imgContainer= array();
		
		$time = new \DateTime();
		$t_add=new \DateInterval('PT10M');
		
		$order=0;
		
		$num=0;
		$img_base_name="image_db_backup/";
		$cat="home";
		
		$time->add($t_add);//add one second each time for correct display order of the news
		$newsContainer[$num] = new News();
		$newsContainer[$num]			
			->setTitle('Welcom\'')
			->setCategory($cat)->setDate(clone $time)->setLinknews('home')
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
				Dear international students,

You are about to become new students of TEM or TSP. You probably have a lot of questions to ask.
This website was created to answer these questions and give you a preview of the life on the campus.

Welcom is a club composed of students from both schools. Our goal is to welcome you on the campus, help you during your stay and, of course, introduce you to the social life of TMSP. We will organize a certain number of events, such as parties, visits to Paris during week ends, etc. 

You can contact us either by e-mail (welcom@tem-tsp.eu) or by Facebook on the Welcom’ page or on the Welcom’ internationnal group in which you will find plenty of welcomers and students eager to help you. 

Each year, lots of international students come to our campus and leave with a wonderful experience. You may be the next one! The whole Welcom team is waiting for your arrival on the campus.

~Mamie~
							')
			->setOrdernumber($order)
			->setPartoftrinews(false);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Who are we ?')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
					We are a group of around 35 students, our goal is to welcome and integrate all the international students on campus. All year around we organize: trips to Paris and other French cities, also as well as parties and dinners on the campus.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Our first mission: to welcome you')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			We are available to help you to arrive on campus and to settle into your new Maisel room. Please read the HELP category to get more information about how to reach the campus. 
When you arrive on the campus we will give you your student card, take you to your Maisel room and visit the campus.
						')
			->setOrdernumber($order)
			->setPartoftrinews(true);
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Our second mission: to integrate you to Telecom\'s student life')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			All year long Welcom organizes trips to Paris on the week end and parties on the campus. The goal is for you to practice your English or French, get to know more people and discover the country.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('What kind of events?')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			We organize as many events as possible, here are some examples:
					')
			->setOrdernumber($order)
			->setPartoftrinews(false);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('International dinners')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
Let’s all meet in Maisel and share food from different countries.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
		
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('BBQ Parties')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
Organized during the summer season.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
	
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Parrainage Party (buddy program)')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
A friendly speed-dating party during where you have the opportunity to meet a lot of French students. 
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Cheese & Wine Party')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
With Epicurieux, the wine association, we sell different kinds of cheeses and wines so you can taste specialties of French regions. 
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
	
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Christmas dinner')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
Go with the photography association and take the best shots of Paris from the greatest points of view.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
	
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Roofs of Paris')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
Go with the photography association and take the best shots of Paris from the greatest points of view.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
		$order+=10;

			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Versailles')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
Better to visit this beautiful place with Welcom group not to get lost ;)
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);


			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Fontainebleau')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
One of the most impressive and closest Renaissance castle.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
		

			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Week end to another city')
			->setCategory($cat)->setDate(clone $time)
			->setImage(null)
			->setContent('
There are so many cities to enjoy in France.
				')
			->setOrdernumber($order)
			->setPartoftrinews(true);
		$order+=10;
			
			
			
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$imgContainer[$num]= new ImageCont();
			$imgContainer[$num]
			->setCategory('default')
			->setUpdated($time)
			->setImageName($img_base_name.$cat.'/'."11c40d53524e83234ab29b791b91e545.jpeg");
			$newsContainer[$num]
			->setImage($imgContainer[$num])
			->setTitle('The Welcom\' Team')
			->setImgafcont(true)->setImgbftitle(false)
			->setCategory($cat)->setDate($time)
			->setLinknews('wteam')
			->setAuthor('admin')->setPublished(true)
			->setContent('
		Every year, a group of few students try to make life easier for the hundreds of international students who arrived on the campus.
Let’s introduce them:
						')
			->setOrdernumber($order);
		$order+=10;

			/*-------------------CAMPUS-----------------------*/
			$cat="campus";
			$order=0;
			
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$imgContainer[$num]= new ImageCont();
			$imgContainer[$num]
			->setCategory('default')
			->setUpdated(clone $time)
			->setImageName($img_base_name.$cat.'/'."c4e69dce40295ea7c0ac51730804d455.jpeg");
			$newsContainer[$num]
			->setImage($imgContainer[$num])
			->setTitle('Campus Life')
			->setCategory('main_campus')->setDate(clone $time)
			->setLinknews('campus')
			->setAuthor('admin')->setPublished(true)
			->setContent('
		Learn more about the place where most of your favourite activities will take place !
						')
			->setOrdernumber($order);
		$order+=10;
			
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Asociations')
			->setCategory('campus')->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
		There are a lot of associations and clubs that you might want to join or whose services you might enjoy:
					')
			->setOrdernumber($order);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('MiNET')
			->setCategory('campus')->setDate(clone $time)->setImage(null)
			->setContent('
		Getting a 100 MB/s wired and wireless internet connection in your MAISEL room for 50€ a year?! No way! MiNET is the main campus IT association, and that’s exactly what it provides. Its members can help you solve IT-related problems.
					')
			->setOrdernumber($order)
			->setPartoftrinews(true);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('AbsINThe')
			->setCategory('campus')->setDate(clone $time)->setImage(null)
			->setContent('
			Want to enjoy a cold beer or a French cider with your friends in the evening? AbsINThe’s staff is present every night from 10 PM to 1 AM in the foyer. 
					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Epicurieux')
			->setCategory('campus')->setDate(clone $time)->setImage(null)
			->setContent('
			A “dégustation” with Epicurieux is what you’re looking for. You’ve heard a lot about French wines but never got a chance to taste them. This is the moment.
					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
		$order+=10;
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('ASINT')
			->setCategory('campus')->setDate(clone $time)->setImage(null)
			->setContent('
			You are basically planning six months of beers, cheese and wine yet you still want to be in shape when you go back home? Don’t worry! ASINT provides you with a wide range of sports you can practice directly on the campus: tennis, basketball, soccer, volley, handball, rugby, bodybuilding, sailing and many more available.
					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
		
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('BDA')
			->setCategory('campus')->setDate(clone $time)->setImage(null)
			->setContent('
			Tired after a busy day, change your ideas with BDA. BDA amongst other activities they offer dancing lessons (rock, salsa, street dance, contemporary dances, belly dance …) and manages a room full of musical instruments, and if you wish you can play in a group.
					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('BDE')
			->setCategory('campus')->setDate(clone $time)->setImage(null)
			->setContent('
			Large parties are organized at least every second Friday of the week and are supervised by the BDE, the student association. 
					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
		$order+=10;
				
			
				
			
			
/*---------------------------------------housing--------------------*/
			$cat="housing";
			$order=0;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$imgContainer[$num]= new ImageCont();
			$imgContainer[$num]
			->setCategory('default')
			->setUpdated(clone $time)
			->setImageName($img_base_name.$cat.'/'."9a3113efe15f391790592b0797cf5ae3.jpeg");
			$newsContainer[$num]
			->setImage($imgContainer[$num])
			->setTitle('Housing')
			->setCategory('main_'.$cat)->setDate(clone $time)->setLinknews('housing')
			->setAuthor('admin')->setPublished(true)
			->setContent('
			Learn about the housing office of TMSP and financial help you can apply to here in France!
						')
			->setOrdernumber($order);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('MAISEL')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			Maisel is an association on campus that provides housing for most of Telecom students. There are 7 different buildings: U1, U2, U3, U4, U5, U6 and U7.
U1 to U4: on campus and were built in 1980’s.
U5 is across the road and built in 2000’s.
U6 is quite new and downtown.
U7 is brand new (opened in 2016) and across the street.
<a href="/pdfs/campus-map.pdf" onclick="window.open(this.href, \'\', \'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no\'); return false;"><strong>Here</strong></a>you can download the campus map.
						')
			->setOrdernumber($order);
		$order+=10;
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('What you can find in your MAISEL room')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			Furniture is provided but you have no utensil in your room. 
Often students when leaving the Maisel give us any utensil they don’t want to take home (glasses, plates, cutlery, pans or hangers), when you arrive please don’t hesitate to pick some up in our office.
You can rent bed sheets and pillows from Welcom. From around 20€ a year.
						')
			->setOrdernumber($order);
		$order+=10;
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('CAF and its APL/ALS ')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			This social program is provided by the French government. APL and ALS are financial helps for student toward housing. The amount depends on your situation and the Maisel building you live in. Generally it gives to 1/3 to almost the full rent.
You can click <a href="http://maisel.tem-tsp.eu/accommodation/article/housing-subsidies?lang=en" onclick="window.open(this.href, \'\', \'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no\'); return false;"><strong>Here</strong></a>  to visualize the information about the amounts for each building.
To get this help you will need to fill document by the school and by the CAF. Be careful it takes time.
						')
			->setOrdernumber($order);
		$order+=10;

/*-------------------LIF-----------------------*/
			$cat="LIF";
			$order=0;
				
				
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$imgContainer[$num]= new ImageCont();
			$imgContainer[$num]
			->setCategory('default')
			->setUpdated(clone $time)
			->setImageName($img_base_name.$cat.'/'."e2444d002da7fa6bbd86a53db4bac6a5.jpeg");
			$newsContainer[$num]
			->setImage($imgContainer[$num])
			->setTitle('Living in France')
			->setCategory('main_LIF')->setDate(clone $time)
			->setLinknews('lif')
			->setAuthor('admin')->setPublished(true)
			->setContent('
		Practical informations on transport, phone, bank account...
						')
			->setOrdernumber($order);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Transport')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
Paris is in the region called Ile-de-France: this region provides a lot of transport options. 
You can use train to go other French cities,
RER lines link Paris and it’s suburbs,
Metro is the fastest way to travel inside of Paris, 
And there are also buses and tramway.
The trains are managed by the national company SNCF and the Ile-de-France transport by RATP. On their website you can find maps and itineraries. [links]
						')
			->setPartoftrinews(true)
			->setOrdernumber($order);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Cellphone')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
		If you want to get a telephone chip for your cellphone in France it’s possible, even for 1 year or 6 months. In France there 4 companies dealing with chips: Orange, Bouygues, SFR and Free. 
<a href="/pdfs/forfait-mobile.pdf" onclick="window.open(this.href, \'\', \'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no\'); return false;"><strong>Here</strong></a>
					you can download a document giving you all the details about their offers. 
					')
					->setPartoftrinews(true)
					->setOrdernumber($order);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Bank account')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			You need a bank account in France? It’s really easy from the campus. Welcom gets a partnership with the bank Société Générale so you can get the information quickly and in English. This bank will be present in the school the week of your arrival if you want to sign in. Either you can register in another bank, in Evry there are several bank office available.
There is a ATM machine on the campus.
					')
					->setPartoftrinews(true)
					->setOrdernumber($order);
		$order+=10;
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Visa')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			You are a European student? You don’t need more than your ID.
You are a non-European student? You need a visa, it’s delivered from your national administration and last 6 to 12 months. Be careful, you may need to renew your residence permit. 
To do so you need to go the Evry Prefecture (5-10 minutes walking from the campus). 
					')
					->setPartoftrinews(true)
					->setOrdernumber($order);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Social security')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			In France you need to register to a social security program to be entirely covered for your medical expenses. At your arrival, half-day will be dedicated to your subscription to social security so that you understand the details and the price of this program.
					')
					->setPartoftrinews(true)
					->setOrdernumber($order);
			
			/*-------------------HELP-----------------------*/
			$cat="help";
			$order=0;
			
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$imgContainer[$num]= new ImageCont();
			$imgContainer[$num]
			->setCategory('default')
			->setUpdated(clone $time)
			->setImageName($img_base_name.$cat.'/'."402fb82f498c69a672595684addb6e0a.jpeg");
			$newsContainer[$num]
			->setImage($imgContainer[$num])
			->setTitle('Help')
			->setCategory('img_'.$cat)->setDate(clone $time)
			->setLinknews('help')
			->setAuthor('admin')->setPublished(true)
			->setContent('
					Find here contacts, how to reach the campus, a survival guide ...
					')
			->setOrdernumber($order);
		$order+=10;
			
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Contacts in Telecom\'s administration')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setPrintcontent(false)
			->setOrdernumber($order);
		$order+=10;
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('TEM PASSWORLD / MSC: Isabelle TOUFFET')
			->setCategory($cat)->setDate(clone $time)->setImage(null)
			->setContent('
			E-mail : isabelle.touffet@telecom-em.eu
Phone : 45 98 (internal) – 01 60 76 45 98 (external)
Room: DIR 113
						')
						->setOrdernumber($order)
						->setPartoftrinews(true);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('TSP: Laura Landes')
			->setCategory($cat)->setDate(clone $time)->setImage(null)
			->setContent('
			E-mail: Laura.Landes@telecom-sudparis.eu
Phone : 42 26 (internal) – 01 60 76 42 26 (external)
Room : DIR 209
						')
						->setOrdernumber($order)
						->setPartoftrinews(true);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('TEM EXCHANGE: Isabel-Mary MORGAN ')
			->setCategory($cat)->setDate(clone $time)->setImage(null)
			->setContent('
			E-mail : nicole.viset@telecom-em.eu
Phone : 42 44 (internal) – 01 60 76 42 44 (external)
Room: AO7
						')
						->setOrdernumber($order)
						->setPartoftrinews(true);
		$order+=10;
			
			
			
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Contacts in Welcom\'')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
You can reach us through different way:
By mail : welcom@tem-tsp.com,
By texting our FB page: <a href="https://www.facebook.com/Welcom-Evry-145300522222908/">here</a>
By integrating the International FB page: <a href="https://www.facebook.com/groups/338765722812791/?fref=ts">here</a>
By contacting someone from Welcom staff.
					
					')
			->setOrdernumber($order);
		$order+=10;
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('How to reach the campus ?')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setPrintcontent(false)
			->setOrdernumber($order);
		$order+=10;
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Taxi')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			Taking a taxi is usually the easiest way to get to Évry with heavy suitcases. The school has a partnership with taxi drivers, they can get you from the Roissy-Charles de Gaulle airport to the campus for 130€. 
(contact info)

Orly is the nearest airport to Evry, a ride can be as cheap as 30 Euros but with traffic, luggage and number of persons, you could pay as much as 70 Euros.
(partnership?)
					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('UBER')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			Another partnership with Uber is available: using the code BDETMSP you can have a -10€ discount. Thanks to that you are also sure that the driver speaks English! 
					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
			$order+=10;
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('RER, metro and bus')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
<p>From Charles de Gaulle Airport by RER:</p>
<p>&nbsp; &nbsp; &nbsp;You will need to take the RER B to Ch&acirc;telet and then the RER D from Ch&acirc;telet to &Eacute;vry Duration: Two hours Price: one way 18 &euro;</p>

<p>From Orly Airport by RER and bus:</p>

<p>&nbsp; &nbsp; &nbsp;You will need to take the RER and a bus, it will take you one hour to get to the airport: Bus 285 to Juvisy. RER D from Juvisy to &Eacute;vry Courcouronnes Price: one way 5&euro;</p>

<p>If you want to check the fastest way to get to your destination through public transport in the Paris agglomeration, you can always use this RATP website tool <a href="http://www.ratp.fr/itineraires/en/ratp/recherche-avancee">Here</a></p> 

					')
					->setOrdernumber($order)
					->setPartoftrinews(true);
			$time->add($t_add);//add one second each time for correct display order of the news
			$num++;
			$newsContainer[$num] = new News();
			$newsContainer[$num]
			->setTitle('Survival guide')
			->setCategory($cat)->setDate(clone $time)
			->setAuthor('admin')->setPublished(true)->setImage(null)
			->setContent('
			Welcom made a small guide which you can read to know everything you need to survive in Télécom and Evry: from the phone contracts to the map of the city spots or even advice for your Maisel life. You can download
					it
					<a href="/pdfs/WelcomeSurvivalGuide.pdf">here</a>
			.You can also find a usefull French guide <a href="/pdfs/French-Guide.pdf">here</a>.
					')
			->setPartoftrinews(true)
			->setOrdernumber($order);
		$order+=10;
				
			
				

				
		
		foreach($imgContainer as $imgi)
		{
			$manager->persist($imgi);
		}
		foreach($newsContainer as $newsi)
		{
			$manager->persist($newsi);			
		}		
		$manager->flush();
	}
}