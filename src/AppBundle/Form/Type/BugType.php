<?php

namespace AppBundle\Form\Type;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

use AppBundle\Model\Food;
use AppBundle\DataTransformer\FoodToStringTransformer;

/**
 * BugType class
 */
class BugType extends AbstractType
{
    /**
     * @var EntityManager $entityManager
     */
    protected $entityManager;

    /**
     * @var array
     */
    protected $foodList;

    /**
     * @param YMailManager $yMailManager
     */
    function __construct(EntityManager $entityManager)
    {
        $this->entityManager      = $entityManager;
        $this->foodList = array(
            'pizza' => new Food('good', 10, 'Pizza Mozarella'),
            'tomato' => new Food('soso', 5, 'Salad of tomatoes')
        );
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $transformer = new FoodToStringTransformer($this->entityManager);

        $builder
            ->add($builder->create('food', 'choice', [
                    'label'   => 'form.food.choose_food',
                    'choices' => $this->getAvailableFood()
                ]
            )->addModelTransformer($transformer))
        ;
    }

    /**
     * @return array
     */
    public function getAvailableFood()
    {
        $availFood = array();

        foreach ($this->foodList as $food) {
            $availFood[$food->getName()] = $food;
        }

        return $availFood;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'translation_domain' => 'food',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'bug_create';
    }
}
