<?php

namespace Devotion\PHPUnitChartBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @copyright (c) 2016 Vincent Catillon
 * @ORM\Entity
 * @ORM\HasLifecycleCallbacks()
 */
class Metrics extends AbstractComparable
{
    /**
     * Identifier
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * Filename
     * @ORM\Column(type="string", length=100)
     */
    private $filename;

    /**
     * Total files
     * @var int $totalFiles
     * @ORM\Column(type="integer", name="total_fiels")
     */
    private $totalFiles = 0;

    /**
     * Total classes
     * @var int $totalClasses
     * @ORM\Column(type="integer", name="total_classes")
     */
    private $totalClasses = 0;

    /**
     * Covered methods
     * @var int $coveredMethods
     * @ORM\Column(type="integer", name="covered_methods")
     */
    private $coveredMethods = 0;

    /**
     * Total methods
     * @var int $totalMethods
     * @ORM\Column(type="integer", name="total_methods")
     */
    private $totalMethods = 0;

    /**
     * Covered conditionals
     * @var int $coveredConditionals
     * @ORM\Column(type="integer", name="covered_conditionals")
     */
    private $coveredConditionals = 0;

    /**
     * Total conditionals
     * @var int $totalConditionals
     * @ORM\Column(type="integer", name="total_conditionals")
     */
    private $totalConditionals = 0;

    /**
     * Covered statements
     * @var int $coveredStatements
     * @ORM\Column(type="integer", name="covered_statements")
     */
    private $coveredStatements = 0;

    /**
     * Total statements
     * @var int $totalStatements
     * @ORM\Column(type="integer", name="total_statements")
     */
    private $totalStatements = 0;

    /**
     * Covered elements
     * @var int $coveredElements
     * @ORM\Column(type="integer", name="covered_elements")
     */
    private $coveredElements = 0;

    /**
     * Total elements
     * @var int $totalElements
     * @ORM\Column(type="integer", name="total_elements")
     */
    private $totalElements = 0;

    /**
     * Creation date
     * @var \DateTime() $createdAt
     * @ORM\Column(type="datetime", name="created_at")
     */
    private $createdAt;

    /**
     * Identifier getter
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Filename getter
     * @return mixed
     */
    public function getFilename()
    {
        return $this->filename;
    }

    /**
     * Filename setter
     * @param mixed $filename
     * @return self
     */
    public function setFilename($filename)
    {
        $this->filename = $filename;

        return $this;
    }

    /**
     * Total files getter
     * @return int
     */
    public function getTotalFiles()
    {
        return $this->totalFiles;
    }

    /**
     * Total files adder
     * @param int $totalFiles
     * @return self
     */
    public function addTotalFiles($totalFiles)
    {
        $this->totalFiles += $totalFiles;

        return $this;
    }

    /**
     * Total classes getter
     * @return int
     */
    public function getTotalClasses()
    {
        return $this->totalClasses;
    }

    /**
     * Total classes adder
     * @param int $totalClasses
     * @return self
     */
    public function addTotalClasses($totalClasses)
    {
        $this->totalClasses += $totalClasses;

        return $this;
    }

    /**
     * Covered methods getter
     * @return int
     */
    public function getCoveredMethods()
    {
        return $this->coveredMethods;
    }

    /**
     * Covered methods adder
     * @param int $coveredMethods
     * @return self
     */
    public function addCoveredMethods($coveredMethods)
    {
        $this->coveredMethods += $coveredMethods;

        return $this;
    }

    /**
     * Total methods getter
     * @return int
     */
    public function getTotalMethods()
    {
        return $this->totalMethods;
    }

    /**
     * Total methods adder
     * @param int $totalMethods
     * @return self
     */
    public function addTotalMethods($totalMethods)
    {
        $this->totalMethods += $totalMethods;

        return $this;
    }

    /**
     * Percentage methods getter
     * @return float
     */
    public function getPercentageMethods()
    {
        return $this->totalMethods ? ($this->coveredMethods / $this->totalMethods) * 100 : 0;
    }

    /**
     * Covered conditionals getter
     * @return int
     */
    public function getCoveredConditionals()
    {
        return $this->coveredConditionals;
    }

    /**
     * Covered conditionals adder
     * @param int $coveredConditionals
     * @return self
     */
    public function addCoveredConditionals($coveredConditionals)
    {
        $this->coveredConditionals += $coveredConditionals;

        return $this;
    }

    /**
     * Total conditionals getter
     * @return int
     */
    public function getTotalConditionals()
    {
        return $this->totalConditionals;
    }

    /**
     * Total conditionals adder
     * @param int $totalConditionals
     * @return self
     */
    public function addTotalConditionals($totalConditionals)
    {
        $this->totalConditionals += $totalConditionals;

        return $this;
    }

    /**
     * Percentage conditionals getter
     * @return float
     */
    public function getPercentageConditionals()
    {
        return $this->totalConditionals ? ($this->coveredConditionals / $this->totalConditionals) * 100 : 0;
    }

    /**
     * Covered statements getter
     * @return int
     */
    public function getCoveredStatements()
    {
        return $this->coveredStatements;
    }

    /**
     * Covered statements adder
     * @param int $coveredStatements
     * @return self
     */
    public function addCoveredStatements($coveredStatements)
    {
        $this->coveredStatements += $coveredStatements;

        return $this;
    }

    /**
     * Total statements getter
     * @return int
     */
    public function getTotalStatements()
    {
        return $this->totalStatements;
    }

    /**
     * Total statements adder
     * @param int $totalStatements
     * @return self
     */
    public function addTotalStatements($totalStatements)
    {
        $this->totalStatements += $totalStatements;

        return $this;
    }

    /**
     * Percentage statements getter
     * @return float
     */
    public function getPercentageStatements()
    {
        return $this->totalStatements ? ($this->coveredStatements / $this->totalStatements) * 100 : 0;
    }

    /**
     * Covered elements getter
     * @return int
     */
    public function getCoveredElements()
    {
        return $this->coveredElements;
    }

    /**
     * Covered elements adder
     * @param int $coveredElements
     * @return self
     */
    public function addCoveredElements($coveredElements)
    {
        $this->coveredElements += $coveredElements;

        return $this;
    }

    /**
     * Total elements getter
     * @return int
     */
    public function getTotalElements()
    {
        return $this->totalElements;
    }

    /**
     * Total elements adder
     * @param int $totalElements
     * @return self
     */
    public function addTotalElements($totalElements)
    {
        $this->totalElements += $totalElements;

        return $this;
    }

    /**
     * Percentage elements getter
     * @return float
     */
    public function getPercentageElements()
    {
        return $this->totalElements ? ($this->coveredElements / $this->totalElements) * 100 : 0;
    }

    /**
     * Creation date getter
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Creation date setter
     * @param \DateTime $datetime
     * @return self
     */
    public function setCreatedAt(\DateTime $datetime)
    {
        $this->createdAt = $datetime;

        return $this;
    }

    /**
     * @ORM\PrePersist
     */
    public function prePersist()
    {
        $this->setCreatedAt(new \DateTime());
    }

    /**
     * {@inheritdoc}
     */
    public function getComparableProperties()
    {
        $properties = $this->jsonSerialize();
        unset($properties['created_at']);

        return $properties;
    }

    /**
     * {@inheritdoc}
     */
    public function jsonSerialize()
    {
        return array(
            'total_files' => $this->getTotalFiles(),
            'total_classes' => $this->getTotalClasses(),
            'covered_methods' => $this->getCoveredMethods(),
            'total_methods' => $this->getTotalMethods(),
            'percentage_methods' => $this->getPercentageMethods(),
            'covered_conditionals' => $this->getCoveredConditionals(),
            'total_conditionals' => $this->getTotalConditionals(),
            'percentage_conditionals' => $this->getPercentageConditionals(),
            'covered_statements' => $this->getCoveredStatements(),
            'total_statements' => $this->getTotalStatements(),
            'percentage_statements' => $this->getPercentageStatements(),
            'covered_elements' => $this->getCoveredElements(),
            'total_elements' => $this->getTotalElements(),
            'percentage_elements' => $this->getPercentageElements(),
            'created_at' => $this->getCreatedAt() ? $this->getCreatedAt()->format('c') : null,
        );
    }
}
