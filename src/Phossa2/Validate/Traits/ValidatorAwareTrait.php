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

namespace Phossa2\Validate\Traits;

use Phossa2\Validate\Message\Message;
use Phossa2\Validate\Exception\NotFoundException;
use Phossa2\Validate\Interfaces\ValidatorInterface;
use Phossa2\Validate\Interfaces\ValidatorAwareInterface;

/**
 * ValidatorAwareTrait
 *
 * Implementation of ValidatorAwareInterface
 *
 * @package Phossa2\Validate
 * @author  Hong Zhang <phossa@126.com>
 * @see     ValidatorAwareInterface
 * @version 2.0.0
 * @since   2.0.0 added
 */
trait ValidatorAwareTrait
{
    /**
     * @var    ValidatorInterface
     * @access protected
     */
    protected $validator;

    /**
     * {@inheritDoc}
     */
    public function setValidator(ValidatorInterface $validator = null)
    {
        $this->validator = $validator;
        return $this;
    }

    /**
     * {@inheritDoc}
     */
    public function getValidator()/*# : ValidatorInterface */
    {
        if (null === $this->validator) {
            throw new NotFoundException(
                Message::get(Message::VALIDATOR_NOT_FOUND, get_called_class()),
                Message::VALIDATOR_NOT_FOUND
            );
        }
        return $this->validator;
    }
}
