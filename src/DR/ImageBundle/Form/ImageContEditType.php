<?php

namespace DR\ImageBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ImageContEditType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
    	//we remove the old image field that was mandatory to create and we repalce it
    	//with one that's optional (you don't have to modify the image if you don't 
    	//wish to ! )
    	$builder
    	->remove('image')
    	->remove('save');
        $builder
    	->add('image', FileType::class, array('label' => 'Image:', 'required' => false))
    	->add('save',  SubmitType::class);
    }
    public function getParent()
    {
    	return ImageContType::class;
    }


}
