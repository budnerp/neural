<?php
/**
 * Neural Network.
 * User: Piotr Budner
 * Date: 22.04.2018
 * Time: 22:14
 */

namespace Devel\Neural\Model;


class Neuron
{
    /**
     * @var float
     */
    private $value, $activatedValue, $derivedValue;

    /**
     * Neuron constructor.
     * @param float $value
     */
    public function __construct(float $value)
    {
        $this->setValue($value);
        $this->activate();
        $this->derive();
    }

    /**
     * Fast Sigmoid function
     * f(x) = x / (1 + |x|)
     */
    public function activate()
    {
        $activatedValue = $this->value / (1 + abs($this->value));
        $this->setActivatedValue($activatedValue);
    }

    /**
     * Derivative for Fast Sigmoid function
     * f'(x) = f(x) * (1 - f(x))
     */
    public function derive()
    {
        $derivedValue = $this->getActivatedValue() * (1 - $this->getActivatedValue());
        $this->setDerivedValue($derivedValue);
    }

    /**
     * @param float $value
     */
    public function setValue(float $value)
    {
        $this->value = $value;
    }

    /**
     * @return float
     */
    public function getValue(): float
    {
        return $this->value;
    }

    /**
     * @param float $activatedValue
     */
    public function setActivatedValue(float $activatedValue)
    {
        $this->activatedValue = $activatedValue;
    }

    /**
     * @return float
     */
    public function getActivatedValue(): float
    {
        return $this->activatedValue;
    }

    /**
     * @return float
     */
    public function getDerivedValue(): float
    {
        return $this->derivedValue;
    }

    /**
     * @param float $derivedValue
     */
    public function setDerivedValue(float $derivedValue)
    {
        $this->derivedValue = $derivedValue;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return "v: " . $this->getValue() . ", av: " . $this->getActivatedValue() . ", dv: " . $this->getDerivedValue();
    }
}