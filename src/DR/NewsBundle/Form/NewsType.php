<?php

namespace DR\NewsBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

use Ivory\CKEditorBundle\Form\Type\CKEditorType;

use DR\ImageBundle\Form\ImageContType;

class NewsType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('date')
        ->add('title',TextType::class)
        ->add('author',TextType::class)
        ->add('content',CKEditorType::class)
        ->add('category',TextType::class)
        ->add('published', CheckboxType::class, array('required' => false))
        ->add('imgbftitle', CheckboxType::class, array('required' => false))
        ->add('imgaftitle', CheckboxType::class, array('required' => false))
        ->add('printtitle', CheckboxType::class, array('required' => false))
        ->add('printcontent', CheckboxType::class, array('required' => false))
        ->add('imgafcont', CheckboxType::class, array('required' => false))
        ->add('linknews',TextType::class, array('required' => false))
        ->add('image', ImageContType::class,array('required' => false));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'DR\NewsBundle\Entity\News'
        		
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'dr_newsbundle_news';
    }


}
