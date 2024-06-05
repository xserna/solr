<?php

/**
 * @copyright Copyright (C) Ibexa AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 */

namespace Ibexa\Tests\Solr\Container\Compiler;

use Ibexa\Solr\Container\Compiler\AggregateSortClauseVisitorPass;
use Matthias\SymfonyDependencyInjectionTest\PhpUnit\AbstractCompilerPassTestCase;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;
use Symfony\Component\DependencyInjection\Reference;

class AggregateSortClauseVisitorPassTest extends AbstractCompilerPassTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->setDefinition(
            'ibexa.solr.query.content.sort_clause_visitor.aggregate',
            new Definition()
        );
    }

    /**
     * Register the compiler pass under test, just like you would do inside a bundle's load()
     * method:.
     *
     *   $container->addCompilerPass(new MyCompilerPass());
     */
    protected function registerCompilerPass(ContainerBuilder $container): void
    {
        $container->addCompilerPass(new AggregateSortClauseVisitorPass());
    }

    public function testAddVisitor()
    {
        $serviceId = 'service_id';
        $def = new Definition();
        $def->addTag('ibexa.search.solr.query.content.sort_clause.visitor');
        $this->setDefinition($serviceId, $def);

        $this->compile();

        $this->assertContainerBuilderHasServiceDefinitionWithMethodCall(
            'ibexa.solr.query.content.sort_clause_visitor.aggregate',
            'addVisitor',
            [new Reference($serviceId)]
        );
    }
}
