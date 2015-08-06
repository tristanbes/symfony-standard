<?php

namespace AppBundle\DataTransformer;

use Doctrine\ORM\EntityManager;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;

use AppBundle\Model\Food;

/**
 * Class MailTemplateToNumberTransformer
 */
class FoodToStringTransformer implements DataTransformerInterface
{
    /**
     * @var EntityManager $entityManager
     */
    protected $entityManager;

    /**
     * @param EntityManager $entityManager
     */
    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    /**
     * Transforms an object (Food) to a string (number).
     *
     * @param  Food|null $fod
     *
     * @return string
     */
    public function transform($food)
    {
        if (null === $food) {
            return "";
        }

        return $food->getName().'; '.$food->getPrice();
    }

    /**
     * @param string $ymailName
     *
     * @throws TransformationFailedException if object (Food) is not found.
     *
     * @return null|Food
     */
    public function reverseTransform($food)
    {
        if (!$food) {
            return null;
        }

        // We just don't care for this example.
        // $foodInstance = $this->entityManager->getRepository('...')->findOneBy(array(
        //     'food' => $food,
        // ));

        // if ($foodInstance instanceof Food) {
        //     return $foodInstance;
        // }
    }
}
