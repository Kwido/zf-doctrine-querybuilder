<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace ZF\Doctrine\QueryBuilder\GroupBy\ORM;

class Field
{
    public function orderBy($queryBuilder, $metadata, $option)
    {
        if (!isset($option['alias'])) {
            $option['alias'] = 'row';
        }

        $queryBuilder->addGroupBy($option['alias'] . '.' . $option['field']);
    }
}
