<?php

namespace App\Form;

use App\Entity\ApplicationUser;
use App\Entity\Application;
use App\Entity\Utilisateur;
use App\Repository\ApplicationUserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Doctrine\ORM\EntityManagerInterface;

class ApplicationUserType extends AbstractType
{
    private $em;
    /**
     * @param EntityManagerInterface $em
     */
    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // $q = [];
        $q=$this->em->getRepository(ApplicationUser::class)->getProfil();
        //  dd($q);
        $a=[];
        foreach($q as $i){
            // dd($i->getUser());
            $a []= $i->getUser();
            // return $a
        }
        $builder
            ->add('application', EntityType::class, [
                'class' => Application::class,
                'choice_label' => 'nomApplication',
            ])
            ->add('user', EntityType::class, [
                    'multiple' => false,
                    'class' => ApplicationUser::class,
                    'choices'=>$a
                    // 'query_builder' => function (ApplicationUserRepository $er){
                         
                    //     // foreach( $q as $i){
                    //     //     return $i;
                    //     // }
                    //       return $q;
                    //     }
            ]);    
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => ApplicationUser::class,
        ]);
    }
}
