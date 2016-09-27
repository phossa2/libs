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

namespace Phossa2\Validate;

use Phossa2\Shared\Base\ObjectAbstract;
use Phossa2\Validate\Interfaces\ValidatorInterface;

/**
 * GumpValidator
 *
 * Validator using "wixel/gump"
 *
 * @package Phossa2\Validate
 * @author  Hong Zhang <phossa@126.com>
 * @version 2.0.0
 * @since   2.0.0 added
 */
class GumpValidator extends ObjectAbstract implements ValidatorInterface
{
    /**
     * @var    \GUMP
     * @access protected
     */
    protected $gump;

    /**
     * {@inheritDoc}
     */
    public function validate(array $data, array $rules)/*# : bool */
    {
        $data = $this->getGump()->sanitize($data);
        return true === $this->getGump()->validate($data, $rules) ?
            true : false;
    }

    /**
     * {@inheritDoc}
     */
    public function filter(array $data, array $rules)/*# : array */
    {
        $data = $this->getGump()->sanitize($data);
        return $this->getGump()->filter($data, $rules);
    }

    /**
     * {@inheritDoc}
     */
    public function getError()/*# : array */
    {
        return $this->getGump()->get_errors_array();
    }

    /**
     * @return \GUMP
     * @access protected
     */
    protected function getGump()/*# : Gump */
    {
        if (null === $this->gump) {
            $this->gump = new \GUMP();
        }
        return $this->gump;
    }
}
