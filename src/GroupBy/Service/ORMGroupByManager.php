<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Zf\Doctrine\QueryBuilder\GroupBy\Service;

use ZF\Doctrine\QueryBuilder\GroupBy\GroupByInterface;
use Zend\ServiceManager\AbstractPluginManager;
use Zend\ServiceManager\Exception;
use Doctrine\ORM\QueryBuilder;

class ORMGroupByManager extends AbstractPluginManager
{
    protected $invokableClasses = array();

    public function groupBy(QueryBuilder $queryBuilder, $metadata, $groupBy)
    {
        foreach ($groupBy as $option) {
            if (! isset($option['type']) or ! $option['type']) {
                // @codeCoverageIgnoreStart
                throw new Exception\RuntimeException('Array element "type" is required for all groupby directives');
            }
            // @codeCoverageIgnoreEnd

            $groupByHandler = $this->get(strtolower($option['type']), array($this));

            $groupByHandler->groupBy($queryBuilder, $metadata, $option);
        }
    }

    /**
     * @param mixed $groupBy
     *
     * @return void
     * @throws Exception\RuntimeException
     */
    public function validatePlugin($groupBy)
    {
        if ($groupBy instanceof GroupByInterface) {
            // we're okay
            return;
        }

        // @codeCoverageIgnoreStart
        throw new Exception\RuntimeException(sprintf(
            'Plugin of type %s is invalid; must implement %s\Plugin\PluginInterface',
            (is_object($groupBy) ? get_class($groupBy) : gettype($groupBy)),
            __NAMESPACE__
        ));
        // @codeCoverageIgnoreEnd
    }
}
