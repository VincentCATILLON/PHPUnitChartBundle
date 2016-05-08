<?php

namespace Devotion\PHPUnitChartBundle\Service;

use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Devotion\PHPUnitChartBundle\Entity\Metrics;

/**
 * Coverage service
 *
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @copyright Vincent Catillon (c) 2016
 */
class Coverage
{
    /**
     * Path containing the report file
     * @var string $basePath
     */
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
     * @return Metrics
     */
    public function getMetrics($file)
    {
        $filepath = $this->basePath.$file;
        if (!file_exists($filepath)) {
            throw new FileNotFoundException(sprintf('Invalid input file provided: %s', $filepath));
        }

        $xml = new \SimpleXMLElement(file_get_contents($filepath));
        $values = $xml->xpath('//metrics');

        $metrics = new Metrics();
        foreach ($values as $value) {
            $metrics
                ->addTotalFiles(intval($value['files']))
                ->addTotalClasses(intval($value['classes']))
                ->addCoveredMethods(intval($value['coveredmethods']))
                ->addTotalMethods(intval($value['methods']))
                ->addCoveredConditionals(intval($value['coveredconditionals']))
                ->addTotalConditionals(intval($value['conditionals']))
                ->addCoveredStatements(intval($value['coveredstatements']))
                ->addTotalStatements(intval($value['statements']))
                ->addCoveredElements(intval($value['coveredelements']))
                ->addTotalElements(intval($value['elements']));
        }
        $metrics->setFilename($file);

        return $metrics;
    }
}
