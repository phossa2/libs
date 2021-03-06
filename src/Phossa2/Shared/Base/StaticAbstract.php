<?php
/**
 * Phossa Project
 *
 * PHP version 5.4
 *
 * @category  Library
 * @package   Phossa2\Shared
 * @copyright Copyright (c) 2016 phossa.com
 * @license   http://mit-license.org/ MIT License
 * @link      http://www.phossa.com/
 */
/*# declare(strict_types=1); */

namespace Phossa2\Shared\Base;

/**
 * StaticAbstract
 *
 * A static class skeleton for inheritting
 *
 * @package Phossa2\Shared
 * @author  Hong Zhang <phossa@126.com>
 * @see     ClassNameInterface
 * @version 2.0.0
 * @since   2.0.0 added
 */
abstract class StaticAbstract implements ClassNameInterface
{
    use StaticTrait, ClassNameTrait;
}
