<?php

namespace LpWeb\PaymentBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('lp_web_payment');

        $rootNode
            ->children()
				->arrayNode('paypal')->isRequired()
                    ->addDefaultsIfNotSet()
					->children()
					->scalarNode('mode')->isRequired()->end()
					->scalarNode('client_id')->isRequired()->end()
					->scalarNode('client_secret')->isRequired()->end()
					->scalarNode('logLevel')->isRequired()->end()
					->end()
			->end()
        ;

        return $treeBuilder;
    }
}
