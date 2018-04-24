<?php
/**
 * Neural Network.
 * User: Piotr Budner
 * Date: 24.04.2018
 * Time: 21:23
 */

declare(strict_types=1);

use \PHPUnit\Framework\TestCase;
use \PHPUnit\Framework\MockObject\MockObject;
use \Devel\Neural\Model\Neuron;

final class NeuronTest extends TestCase
{
    const NEURON_VALUE = 0.9;
    
    /**
     * @var MockObject
     */
    private $neuron;

    /**
     * Set up test
     */
    protected function setUp()
    {
        parent::setUp();

        $this->neuron = $this->getMockBuilder(Neuron::class)
            ->setConstructorArgs([self::NEURON_VALUE])
            ->setMethods(['__constructor'])
            ->getMock();
    }

    /**
     * @throws ReflectionException
     */
    public function testAreValuesCalculated()
    {
        $neuron = $this->getMockBuilder(Neuron::class)
            ->disableOriginalConstructor()
            ->getMock();

        $neuron->expects($this->once())->method('setValue');
        $neuron->expects($this->once())->method('activate');
        $neuron->expects($this->once())->method('derive');

        $reflection = new \ReflectionClass(Neuron::class);
        $constructor = $reflection->getConstructor();
        $constructor->invoke($neuron, self::NEURON_VALUE);
    }

    /**
     * Test activate function
     * @return float
     */
    public function testActivate(): float
    {
        $activatedValue = self::NEURON_VALUE / (1 + abs(self::NEURON_VALUE));

        $this->assertEquals($activatedValue, $this->neuron->getActivatedValue());

        return $activatedValue;
    }

    /**
     * Test derive function
     * @depends testActivate
     * @param float $activatedValue
     */
    public function testDerive(float $activatedValue) {
        $derivedValue = $activatedValue * (1 - $activatedValue);

        $this->assertEquals($derivedValue, $this->neuron->getDerivedValue());
    }
}