<?php
//strategy

class Context 
{
	private $strategy;

	public function __construct(Strategy $strategy)
	{
		$this->strategy=$strategy;
	}

	 public function setStrategy(Strategy $strategy)
    {
        $this->strategy = $strategy;
    }

	public function doSomeBusinessLogic():void
	{
		echo "Context:Sorting data using the strategy (not sure show it'll do it)\n";
		$result=$this->strategy->doAlgorithm(["a","b","c","d","e"]);
		echo implode(",",$result)."\n";
	}
}

interface Strategy 
{
	public function doAlgorithm(array $data):array;
}

class ConcreteStrategyA implements Strategy
{
	public function doAlgorithm(array $data):array
	{
		rsort($data);
		return $data;
	}
} 

class ConcreteStrategyB implements Strategy
{
	public function doAlgorithm(array $data):array
	{
		rsort($data);
		return $data;
	}
} 


$context = new Context(new ConcreteStrategyA());
echo "Client: Strategy is set to normal sorting.\n";
$context->doSomeBusinessLogic();

echo "<br/>";

echo "Client: Strategy is set to reverse sorting.\n";
$context->setStrategy(new ConcreteStrategyB());
$context->doSomeBusinessLogic();

//https://refactoring.guru/ru/design-patterns/strategy/php/example
?>