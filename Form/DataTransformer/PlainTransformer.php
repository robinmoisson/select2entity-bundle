<?php

namespace Tetranz\Select2Bundle\Form\DataTransformer;

use Doctrine\DBAL\Exception\DriverException;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\DataTransformerInterface;
use Symfony\Component\Form\Exception\TransformationFailedException;
use Symfony\Component\PropertyAccess\PropertyAccess;

/**
 * Data transformer for single mode (i.e., multiple = false)
 *
 * Class EntityToPropertyTransformer
 * @package Tetranz\Select2Bundle\Form\DataTransformer
 */
class PlainTransformer implements DataTransformerInterface
{
    /**
     * Transform value to array
     *
     * @param mixed value
     * @return array
     */
    public function transform($value)
    {
        $data = array();
        if (null === $value) {
            return $data;
        }

        $data[$value] = $value;

        return $data;
    }

    /**
     * Transform to single id value to an entity
     *
     * @param string $value
     * @return mixed|null|object
     */
    public function reverseTransform($value)
    {
        return $value;
    }
}
