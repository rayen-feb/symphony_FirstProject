<?php

namespace App\Form;

use App\Entity\Author;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')               // Author name
            ->add('email')              // Author email
            ->add('title')              // Title (Add this field)
            ->add('publicationDate', DateType::class, [ // Add a date picker for publication date
                'widget' => 'single_text',  // Use HTML5 date input
                'format' => 'yyyy-MM-dd',   // Format the date (optional)
            ])
            ->add('enabled', CheckboxType::class, [  // Add a checkbox for enabled field
                'label' => 'Is Enabled?',  // Label for the checkbox
                'required' => false,       // Checkbox should not be required
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Author::class,  // Ensure the form is bound to the Author entity
        ]);
    }
}
