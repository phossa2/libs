<?php
/**
 * Phossa Project
 *
 * PHP version 5.4
 *
 * @category  Library
 * @package   Phossa2\Validate
 * @copyright Copyright (c) 2016 phossa.com
 * @license   http://mit-license.org/ MIT License
 * @link      http://www.phossa.com/
 */
/*# declare(strict_types=1); */

namespace Phossa2\Validate\Exception;

use Phossa2\Shared\Exception\NotFoundException as NFException;

/**
 * NotFoundException for Phossa2\Validate
 *
 * @package Phossa2\Validate
 * @author  Hong Zhang <phossa@126.com>
 * @see     ExceptionInterface
 * @see     NFException
 * @version 2.0.0
 * @since   2.0.0 added
 */
class NotFoundException extends NFException implements ExceptionInterface
{
}
