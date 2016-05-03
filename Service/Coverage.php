<?php

namespace Devotion\PHPUnitChartBundle\Service;

use Symfony\Component\DependencyInjection\ContainerAware;
use Symfony\Component\Filesystem\Exception\FileNotFoundException;

/**
 * Coverage service
 *
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @copyright Vincent Catillon (c) 2016
 */
class Coverage extends ContainerAware
{
    private $basePath;

    /**
     * Coverage constructor.
     * @param string $basePath
     */
    public function __construct($basePath)
    {
        $this->basePath = $basePath;
    }

    /**
     * Coverage metrics getter
     * @param string $file
     * @throws FileNotFoundException
     * @return array
     */
    public function getCoverage($file)
    {
        $file = $this->basePath.$file;
        if (!file_exists($file)) {
            throw new FileNotFoundException(sprintf('Invalid input file provided: %s', $file));
        }

        $xml = new \SimpleXMLElement(file_get_contents($file));
        $metrics = $xml->xpath('//metrics');
        $totalElements = 0;
        $checkedElements = 0;

        foreach ($metrics as $metric) {
            $totalElements   += (int) $metric['elements'];
            $checkedElements += (int) $metric['coveredelements'];
        }

        $coverage = array(
            'covered_elements' => $checkedElements,
            'total_elements' => $totalElements,
            'percentage' => ($checkedElements / $totalElements) * 100,
        );

        return $coverage;
    }
}
