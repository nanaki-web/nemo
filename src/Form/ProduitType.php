<?php

namespace App\Form;

use App\Entity\Produit;
use App\Entity\SsRubrique;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProduitType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nom')
            ->add('description')
            ->add('prix')
            ->add('active')
            ->add('stock')
            ->add('coef')
            ->add('reference')
            ->add('photo')
            ->add('fournisseur')
            ->add('commandes')
            ->add('rubrique' );
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Produit::class,
        ]);
    }
}
