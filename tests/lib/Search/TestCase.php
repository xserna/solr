<?php

/**
 * This file is part of the eZ Platform Solr Search Engine package.
 *
 * @copyright Copyright (C) eZ Systems AS. All rights reserved.
 * @license For full copyright and license information view LICENSE file distributed with this source code.
 *
 * @version //autogentag//
 */
namespace Ibexa\Tests\Solr\Search;

use PHPUnit\Framework\TestCase as BaseTestCase;

/**
 * Base test case for Solr related tests.
 */
abstract class TestCase extends BaseTestCase
{
}

class_alias(TestCase::class, 'EzSystems\EzPlatformSolrSearchEngine\Tests\Search\TestCase');
