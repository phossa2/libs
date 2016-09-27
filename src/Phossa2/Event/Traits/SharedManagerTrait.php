<?php
/**
 * Phossa Project
 *
 * PHP version 5.4
 *
 * @category  Library
 * @package   Phossa2\Event
 * @copyright Copyright (c) 2016 phossa.com
 * @license   http://mit-license.org/ MIT License
 * @link      http://www.phossa.com/
 */
/*# declare(strict_types=1); */

namespace Phossa2\Event\Traits;

use Phossa2\Shared\Shareable\ShareableTrait;
use Phossa2\Event\Interfaces\EventManagerInterface;

/**
 * SharedManagerTrait
 *
 * Support for shared managers using ShareableTrait
 *
 * ```php
 * // one event manager instance
 * $event_dispatcher = new EventDispatcher();
 *
 * // global event manager, default scope is ''
 * $globalManager = EventDispatcher::getShareable();
 *
 * // shared manager for a scope, say 'MVC'
 * $MvcManager = EventDispatcher::getShareable('MVC');
 *
 * // class/interface level shared manager
 * $classManager = EventDispatcher::getShareable('Phossa2\\Config\\Config');
 * ```
 *
 * @package Phossa2\Event
 * @author  Hong Zhang <phossa@126.com>
 * @see     SharedManagerInterface
 * @see     EventManagerInterface
 * @version 2.1.0
 * @since   2.0.0 added
 * @since   2.1.0 updated
 */
trait SharedManagerTrait
{
    use ShareableTrait;

    /**
     * {@inheritDoc}
     */
    public static function onEvent(
        $scope,
        /*# string */ $eventName,
        callable $callable,
        /*# int */ $priority = 0
    )/*# : bool */ {
        foreach ((array) $scope as $sc) {
            /* @var $em EventManagerInterface */
            $em = static::getShareable($sc);
            $em->attach($eventName, $callable, $priority);
        }
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public static function offEvent(
        $scope,
        /*# string */ $eventName = '',
        callable $callable = null
    )/*# : bool */ {
        foreach ((array) $scope as $sc) {
            /* @var $em EventManagerInterface */
            $em = static::getShareable($sc);
            $em->detach($eventName, $callable);
        }
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public static function onGlobalEvent(
        /*# string */ $eventName,
        callable $callable,
        /*# int */ $priority = 0
    )/*# : bool */ {
        // scope '' means GLOBAL
        return static::onEvent('', $eventName, $callable, $priority);
    }

    /**
     * {@inheritDoc}
     */
    public static function offGlobalEvent(
        /*# string */ $eventName = '',
        callable $callable = null
    )/*# : bool */ {
        // scope '' means GLOBAL
        return static::offEvent('', $eventName, $callable);
    }

    /**
     * Override `getOwnScopes()` in ShareableTrait
     *
     * For $this's own scopes, looking for any parent class or interface in
     * all the available scopes.
     *
     * {@inheritDoc}
     */
    protected function getOwnScopes()/*# : array */
    {
        // result
        $result = [];

        // all types avaible
        $allTypes = $this->getAllTypes(static::getScopes());

        // loop thru own scopes
        foreach ($this->scopes as $scope) {
            $result[$scope] = true;
            $this->matchParentType($scope, $allTypes, $result);
        }

        // alway add global scope
        $result[''] = true;

        return array_keys($result);
    }

    /**
     * Get all types (class or interface) from the given scopes
     *
     * @param  array $scopes
     * @return array
     * @access protected
     */
    protected function getAllTypes(array $scopes)/*# : array */
    {
        $result = [];
        foreach ($scopes as $scope) {
            if ($this->isAType($scope)) {
                $result[] = $scope;
            }
        }
        return $result;
    }

    /**
     * Is $type a classname or interface name ?
     *
     * @param  string $type
     * @return bool
     * @access protected
     */
    protected function isAType(/*# string */ $type)/*# : bool */
    {
        return class_exists($type) || interface_exists($type);
    }

    /**
     * is $childType child type of one of the $typesToCheck.
     *
     * Returns the matched types
     *
     * @param  string $childType
     * @param  array $typesToCheck
     * @param  array &$result
     * @access protected
     */
    protected function matchParentType(
        /*# string */ $childType,
        array $typesToCheck,
        array &$result
    )/*# : bool */ {
        foreach ($typesToCheck as $type) {
            if ($this->isAType($childType) &&
                is_a($childType, $type, true)
            ) {
                $result[$type] = true;
            }
        }
    }
}
