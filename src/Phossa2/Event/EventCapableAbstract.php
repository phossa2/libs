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

namespace Phossa2\Event;

use Phossa2\Shared\Base\ObjectAbstract;
use Phossa2\Event\Traits\ListenerTrait;
use Phossa2\Event\Traits\EventCapableTrait;
use Phossa2\Event\Interfaces\ListenerInterface;
use Phossa2\Event\Interfaces\EventCapableInterface;

/**
 * EventCapableAbstract
 *
 * Base class for event capable
 *
 * @package Phossa2\Event
 * @author  Hong Zhang <phossa@126.com>
 * @version 2.1.3
 * @since   2.0.0 added
 * @since   2.1.0 modified with new interfaces
 * @since   2.1.3 added ListenerTrait
 */
abstract class EventCapableAbstract extends ObjectAbstract implements EventCapableInterface, ListenerInterface
{
    use EventCapableTrait, ListenerTrait;
}
