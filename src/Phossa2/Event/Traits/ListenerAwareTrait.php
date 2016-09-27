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

use Phossa2\Event\Interfaces\ListenerInterface;
use Phossa2\Event\Interfaces\EventManagerInterface;
use Phossa2\Event\Interfaces\ListenerAwareInterface;

/**
 * ListenerAwareTrait
 *
 * Implementation of ListenerAwareInterface with scope (shared manager)
 * support.
 *
 * @package Phossa2\Event
 * @author  Hong Zhang <phossa@126.com>
 * @see     ListenerAwareInterface
 * @see     EventManagerInterface
 * @version 2.1.4
 * @since   2.0.0 added
 * @since   2.1.0 updated
 * @since   2.1.4 added hasPriority()
 */
trait ListenerAwareTrait
{
    /**
     * {@inheritDoc}
     */
    public function attachListener(ListenerInterface $listener)/*# : bool */
    {
        // get the standardized handlers of the $listener
        $events = $this->listenerEvents($listener);

        // add to manager's event pool
        foreach ($events as $handler) {
            /* @var $em EventManagerInterface */
            $em = $this;
            if (null !== $handler[3]) { // found scope
                $em = static::getShareable($handler[3]);
            }
            $em->attach($handler[0], $handler[1], $handler[2]);
        }
        return true;
    }

    /**
     * {@inheritDoc}
     */
    public function detachListener(
        ListenerInterface $listener,
        /*# string */ $eventName = ''
    )/*# : bool */ {
        // get the standardized handlers of the $listener
        $events = $this->listenerEvents($listener);

        // try find the match
        foreach ($events as $handler) {
            if ('' == $eventName || $handler[0] === $eventName) {
                $this->offListenerEvent($handler);
            }
        }

        return true;
    }

    /**
     * standardize events definition
     *
     * @param  ListenerInterface $listener
     * @return array
     * @access protected
     */
    protected function listenerEvents(
        ListenerInterface $listener
    )/*# : array */ {
        $result = [];
        foreach ($listener->eventsListening() as $eventName => $data) {
            $newData = $this->expandToHandler($data);
            foreach ($newData as $handler) {
                $result[] = $this->expandWithPriority(
                    $listener,
                    $eventName,
                    $handler
                );
            }
        }
        return $result;
    }

    /**
     * standardize to array of 'method1' or ['method1', 20]
     *
     * @param  mixed $data
     * @return array
     * @access protected
     */
    protected function expandToHandler($data)/*# : array */
    {
        if (is_callable($data)) {
            $result = [$data];
        } elseif (is_string($data)) {
            $result = [$data];
        } elseif ($this->hasPriority($data)) {
            $result = [$data];
        } else {
            $result = $data;
        }
        return (array) $result;
    }

    /**
     * standardize one 'method1' or ['method1', 20, $scope]
     * to [eventName, callable, priority, $scopeIfAny]
     *
     * @param  ListenerInterface $listener
     * @param  string $eventName
     * @param  mixed $data
     * @return array
     * @access protected
     */
    protected function expandWithPriority(
        ListenerInterface $listener,
        /*# string */ $eventName,
        $data
    )/*# : array */ {
        if (is_array($data) && is_int($data[1])) {
            $callable = $this->expandCallable($listener, $data[0]);
            $priority = $data[1];
            $scope = isset($data[2]) ? $data[2] : null;
        } else {
            $callable = $this->expandCallable($listener, $data);
            $priority = 0; // default
            $scope = null;
        }
        return [$eventName, $callable, $priority, $scope];
    }

    /**
     * standardize 'method' or callable to callable
     *
     * @param  ListenerInterface $listener
     * @param  mixed $callable
     * @return callable
     * @access protected
     */
    protected function expandCallable(
        ListenerInterface $listener,
        $callable
    )/*# : callable */ {
        if (is_callable($callable)) {
            return $callable;
        } else {
            return [$listener, $callable];
        }
    }

    /**
     * off listener event [$eventName, $handler, $priority, $scope]
     *
     * @param  array $data
     * @access protected
     */
    protected function offListenerEvent(array $data)
    {
        /* @var $em EventManagerInterface */
        $em = $this;
        if (null !== $data[3]) { // scope found
            $em = static::getShareable($data[3]);
        }
        $em->detach($data[0], $data[1]);
    }

    /**
     * the second value is the priority value
     *
     * @param array $data
     * @access protected
     */
    protected function hasPriority(array $data)/*# : bool */
    {
        return isset($data[1]) && is_int($data[1]);
    }
}
