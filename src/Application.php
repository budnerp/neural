<?php
/**
 * Neural Network.
 * User: Piotr Budner
 * Date: 22.04.2018
 * Time: 23:39
 */

declare(strict_types=1);

namespace App;

use \Devel\Neural\Model\Neuron;

class Application
{
    /**
     * Run application
     */
    public function run()
    {
        $neuron = new Neuron(0.9);

        echo "Neuron A\n";
        echo $neuron."\n";
    }
}