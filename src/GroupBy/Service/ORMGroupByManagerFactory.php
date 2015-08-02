<?php
/**
 * @license   http://opensource.org/licenses/BSD-3-Clause BSD-3-Clause
 * @copyright Copyright (c) 2014 Zend Technologies USA Inc. (http://www.zend.com)
 */

namespace Zf\Doctrine\QueryBuilder\GroupBy\Service;

use Zend\Mvc\Service\AbstractPluginManagerFactory;

class ORMGroupByManagerFactory implements AbstractPluginManagerFactory
{
    const PLUGIN_MANAGER_CLASS = 'ZF\Doctrine\QueryBuilder\GroupBy\Service\ODMGroupByManager';
}
