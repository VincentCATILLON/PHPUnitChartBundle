<?php

namespace Devotion\PHPUnitChartBundle\Entity;

/**
 * Abstract comparable supporting equal method with json comparison
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @copyright (c) 2016 Vincent Catillon
 */
abstract class AbstractComparable implements \JsonSerializable, ComparableInterface
{
    /**
     * {@inheritdoc}
     */
    public function compareTo(ComparableInterface $other, $comparison)
    {
        switch ($comparison) {
            case '==':
                if (get_class($this) !== get_class($other)) {
                    return false;
                }

                return $this->getComparableProperties() == $other->getComparableProperties();
                break;
            default:
                throw new \InvalidArgumentException(
                    sprintf('The "%s" comparison must be implemented in "%s".', $comparison, get_class($this))
                );
        }
    }

    /**
     * Compares two objects using the equality comparison
     * @param ComparableInterface $other
     * @return bool
     */
    public function isEqualsTo(ComparableInterface $other)
    {
        return $this->compareTo($other, '==');
    }
}
