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

namespace Phossa2\Event\Interfaces;

/**
 * EventPrototypeInterface
 *
 * Dealing with event prototype stuff
 *
 * @package Phossa2\Event
 * @author  Hong Zhang <phossa@126.com>
 * @version 2.1.1
 * @since   2.1.1 added
 */
interface EventPrototypeInterface
{
    /**
     * Setup event prototype
     *
     * ```php
     * $this->setEventPrototype(
     *     new MyEvent('prototype')
     * );
     * ```
     *
     * @param  EventInterface $eventPrototype
     * @return $this
     * @access public
     * @api
     */
    public function setEventPrototype(EventInterface $eventPrototype = null);
}
