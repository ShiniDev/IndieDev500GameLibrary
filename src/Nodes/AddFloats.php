<?php

namespace GraphLib\Nodes;

use GraphLib\Graph\Color;
use GraphLib\Graph\Graph;
use GraphLib\Graph\Node;
use GraphLib\Graph\Port;
use GraphLib\Graph\Vector2;

class AddFloats extends Node
{
    /** @var Port The first float input port. */
    public Port $inputA;
    /** @var Port The second float input port. */
    public Port $inputB;
    /** @var Port The float output port (the sum). */
    public Port $output;

    public function __construct(Graph $graph, string $modifier = '')
    {
        parent::__construct('AddFloats', $modifier);

        // Define ports and assign them to properties
        $this->output = new Port($graph, 'Float1', 'float', 1, 0, new Color(0.867, 0.807, 0.0));
        $this->inputA = new Port($graph, 'Float1', 'float', 0, 1, new Color(0.867, 0.808, 0.0));
        $this->inputB = new Port($graph, 'Float2', 'float', 0, 1, new Color(0.867, 0.808, 0.0));

        // Add the ports to the node
        $this->addPort($this->output, new Vector2(19.8, -84.2));
        $this->addPort($this->inputB, new Vector2(-266.1, -84.2));
        $this->addPort($this->inputA, new Vector2(-266.1, -130.0));

        $graph->addNode($this);
    }

    /**
     * Connects a source port to the first input (A).
     * @param Port $port The source port providing the float value.
     */
    public function connectInputA(Port $port)
    {
        $port->connectTo($this->inputA);
        return $this;
    }

    /**
     * Connects a source port to this node's second float input.
     * @param Port $port The source port providing the float value.
     */
    public function connectInputB(Port $port)
    {
        $port->connectTo($this->inputB);
        return $this;
    }

    /**
     * Gets the main output port of the node.
     * @return Port
     */
    public function getOutput(): Port
    {
        return $this->output;
    }
}
