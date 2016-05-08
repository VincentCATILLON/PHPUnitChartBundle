<?php

namespace Devotion\PHPUnitChartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Devotion\PHPUnitChartBundle\Entity\Metrics;

/**
 * @author Vincent Catillon <contact@vincent-catillon.fr>
 * @copyright (c) 2016 Vincent Catillon
 */
class IndexController extends Controller
{
    /**
     * Index action
     * @param Request $request
     * @return Response
     * @throws \InvalidArgumentException
     */
    public function indexAction(Request $request)
    {
        if (!$request->get('file')) {
            throw new \InvalidArgumentException('Report file has to be defined.');
        }
        $file = $request->get('file');
        $title = $request->get('title');
        $type = $request->get('type', $this->container->getParameter('phpunit_chart.type'));
        $historySize = $request->get('history_size', $this->container->getParameter('phpunit_chart.history_size'));
        $coverageService = $this->container->get('phpunit_chart.coverage');
        $metrics = $coverageService->getMetrics($file);
        $lastMetrics = $this->getLastMetrics($metrics, $historySize);

        return $this->render(
            'DevotionPHPUnitChartBundle:Output:'.$type.'.html.twig',
            array(
                'metrics' => $metrics,
                'last_metrics' => array_reverse($lastMetrics),
                'title' => $title,
            )
        );
    }

    /**
     * Last metrics getter
     * @param Metrics $metrics
     * @param int $historySize
     * @return array
     */
    private function getLastMetrics(Metrics $metrics, $historySize)
    {
        $lastMetrics = $this->getDoctrine()
            ->getRepository('DevotionPHPUnitChartBundle:Metrics')
            ->findBy(array('filename' => $metrics->getFilename()), array('createdAt' => 'desc'), $historySize);
        if (empty($lastMetrics) || !$metrics->isEqualsTo($lastMetrics[0])) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($metrics);
            $em->flush();
            array_unshift($lastMetrics, $metrics);
            array_pop($lastMetrics);
        }

        return $lastMetrics;
    }
}
