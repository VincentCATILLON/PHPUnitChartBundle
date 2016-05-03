<?php

namespace Devotion\PHPUnitChartBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

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
        $metrics = $this->container->get('phpunit_chart.coverage')->getCoverage($request->get('file'));

        return $this->render(
            'DevotionPHPUnitChartBundle:Output:'.$this->container->getParameter('phpunit_chart.type').'.html.twig',
            array('metrics' => $metrics)
        );
    }
}
