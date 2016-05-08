<?php

namespace Devotion\PHPUnitChartBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder
            ->root('devotion_php_unit_chart')
                ->addDefaultsIfNotSet()
                ->children()
                    ->scalarNode('base_path')
                        ->defaultValue('%kernel.root_dir%/../')
                    ->end()
                    ->scalarNode('type')
                        ->defaultValue('pie-basic')
                    ->end()
                    ->scalarNode('history_size')
                        ->defaultValue(10)
                    ->end()
                ->end()
            ->end();

        return $treeBuilder;
    }
}
