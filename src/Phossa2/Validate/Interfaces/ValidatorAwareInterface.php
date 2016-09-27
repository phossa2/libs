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

use Phossa2\Validate\Exception\NotFoundException;

/**
 * ValidatorAwareInterface
 *
 * @package Phossa2\Validate
 * @author  Hong Zhang <phossa@126.com>
 * @version 2.0.0
 * @since   2.0.0 added
 */
interface ValidatorAwareInterface
{
    /**
     * Set the validator
     *
     * @param  ValidatorInterface $validator
     * @return $this
     * @access public
     * @api
     */
    public function setValidator(ValidatorInterface $validator = null);

    /**
     * Get the validator
     *
     * @return ValidatorInterface
     * @throws NotFoundException if validator not set
     * @access public
     * @api
     */
    public function getValidator()/*# : ValidatorInterface */;
}
