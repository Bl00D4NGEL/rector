<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace RectorPrefix20211107\Symfony\Component\Console\Input;

use RectorPrefix20211107\Symfony\Component\Console\Exception\InvalidArgumentException;
use RectorPrefix20211107\Symfony\Component\Console\Exception\RuntimeException;
/**
 * InputInterface is the interface implemented by all input classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface InputInterface
{
    /**
     * Returns the first argument from the raw parameters (not parsed).
     *
     * @return string|null The value of the first argument or null otherwise
     */
    public function getFirstArgument();
    /**
     * Returns true if the raw parameters (not parsed) contain a value.
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     * Does not necessarily return the correct result for short options
     * when multiple flags are combined in the same option.
     *
     * @param string|array $values     The values to look for in the raw parameters (can be an array)
     * @param bool         $onlyParams Only check real parameters, skip those following an end of options (--) signal
     *
     * @return bool true if the value is contained in the raw parameters
     */
    public function hasParameterOption($values, $onlyParams = \false);
    /**
     * Returns the value of a raw option (not parsed).
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     * Does not necessarily return the correct result for short options
     * when multiple flags are combined in the same option.
     *
     * @param string|array                     $values     The value(s) to look for in the raw parameters (can be an array)
     * @param string|bool|int|float|array|null $default    The default value to return if no result is found
     * @param bool                             $onlyParams Only check real parameters, skip those following an end of options (--) signal
     *
     * @return mixed The option value
     */
    public function getParameterOption($values, $default = \false, $onlyParams = \false);
    /**
     * Binds the current Input instance with the given arguments and options.
     *
     * @throws RuntimeException
     * @param \Symfony\Component\Console\Input\InputDefinition $definition
     */
    public function bind($definition);
    /**
     * Validates the input.
     *
     * @throws RuntimeException When not enough arguments are given
     */
    public function validate();
    /**
     * Returns all the given arguments merged with the default values.
     *
     * @return array<string|bool|int|float|array|null>
     */
    public function getArguments();
    /**
     * Returns the argument value for a given argument name.
     *
     * @return mixed
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     * @param string $name
     */
    public function getArgument($name);
    /**
     * Sets an argument value by name.
     *
     * @param mixed $value The argument value
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     * @param string $name
     */
    public function setArgument($name, $value);
    /**
     * Returns true if an InputArgument object exists by name or position.
     *
     * @return bool true if the InputArgument object exists, false otherwise
     * @param string $name
     */
    public function hasArgument($name);
    /**
     * Returns all the given options merged with the default values.
     *
     * @return array<string|bool|int|float|array|null>
     */
    public function getOptions();
    /**
     * Returns the option value for a given option name.
     *
     * @return mixed
     *
     * @throws InvalidArgumentException When option given doesn't exist
     * @param string $name
     */
    public function getOption($name);
    /**
     * Sets an option value by name.
     *
     * @param mixed $value The option value
     *
     * @throws InvalidArgumentException When option given doesn't exist
     * @param string $name
     */
    public function setOption($name, $value);
    /**
     * Returns true if an InputOption object exists by name.
     *
     * @return bool true if the InputOption object exists, false otherwise
     * @param string $name
     */
    public function hasOption($name);
    /**
     * Is this input means interactive?
     *
     * @return bool
     */
    public function isInteractive();
    /**
     * Sets the input interactivity.
     * @param bool $interactive
     */
    public function setInteractive($interactive);
}