<?php

namespace Devotion\PHPUnitChartBundle\Entity;

/**
 * Abstract comparable supporting equal method with json comparison
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @copyright (c) 2016 Vincent Catillon
 */
interface ComparableInterface
{
    /**
     * Compares two objects
     * @param ComparableInterface $other
     * @param String              $comparison any of ==, <, >, =<, >=, etc
     * @return bool true|false
     **/
    public function compareTo(ComparableInterface $other, $comparison);

    /**
     * Returns the base comparison properties
     * @return mixed
     */
    public function getComparableProperties();
}
