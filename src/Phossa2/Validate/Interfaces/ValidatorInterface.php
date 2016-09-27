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

namespace Phossa2\Validate\Interfaces;

/**
 * ValidatorInterface
 *
 * @package Phossa2\Validate
 * @author  Hong Zhang <phossa@126.com>
 * @version 2.0.0
 * @since   2.0.0 added
 */
interface ValidatorInterface
{
    /**
     * Do validation
     *
     * @param  string[] $data
     * @param  string[] $rules
     * @return bool
     * @access public
     * @api
     */
    public function validate(array $data, array $rules)/*# : bool */;

    /**
     * Filtering and sanitizing
     *
     * @param  string[] $data
     * @param  string[] $rules
     * @return array
     * @access public
     * @api
     */
    public function filter(array $data, array $rules)/*# : array */;

    /**
     * Get error if any
     *
     * @return string[]
     * @access public
     * @api
     */
    public function getError()/*# : array */;
}
