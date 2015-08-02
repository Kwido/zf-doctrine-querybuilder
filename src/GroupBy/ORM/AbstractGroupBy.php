<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Doctrine\QueryBuilder\GroupBy\ORM;

use ZF\Doctrine\QueryBuilder\GroupBy\GroupByInterface;
use ZF\Doctrine\QueryBuilder\GroupBy\Service\ORMGroupByManager;

abstract class AbstractGroupBy implements GroupByInterface
{
    abstract public function groupBy($queryBuilder, $metadata, $option);

    protected $groupByManager;

    public function __construct($params)
    {
        $this->setGroupByManager($params[0]);
    }

    public function setGroupByManager(ORMGroupByManager $groupByManager)
    {
        $this->groupByManager = $groupByManager;

        return $this;
    }

    public function getGroupByManager()
    {
        return $this->groupByManager;
    }
}
