<?php
//visitor
interface Component
{
	public function accept(Visitor $visitor):void;
}

class ConcreteComponentA implements Component 
{
	public function accept(Visitor $visitor):void
	{
		$visitor->visitComponentA($this);
	}

	public function exclusiveMethodOfConcreteComponentA():string
	{
		return "A";
	}
}

class ConcreteComponentB implements Component 
{
	public function accept(Visitor $visitor):void
	{
		$visitor->visitComponentB($this);
	}

	public function specialMethodOfConcreteComponentB():string
	{
		return "B";
	}
}

interface Visitor
{
	public function visitComponentA(ConcreteComponentA $element):void;

	public function visitComponentB(ConcreteComponentB $element):void;
}

class ConcreteVisitor1 implements Visitor
{
	public function visitComponentA(ConcreteComponentA $element):void
	{
		echo $element->exclusiveMethodOfConcreteComponentA()."+ ConcreteVisitor1+<br/>";
	}

	public function visitComponentB(ConcreteComponentB $element):void
	{
		echo $element->specialMethodOfConcreteComponentB()."+ConcreteVisitor1+<br/>";
	}
}

class ConcreteVisitor2 implements Visitor
{
	public function visitComponentA(ConcreteComponentA $element):void
	{
		echo $element->exclusiveMethodOfConcreteComponentA()."+ ConcreteVisitor2+<br/>";
	}

	public function visitComponentB(ConcreteComponentB $element):void
	{
		echo $element->specialMethodOfConcreteComponentB()."+ConcreteVisitor2+<br/>";
	}
}

function clientCode(array $components,Visitor $visitor)
{
	foreach($components as $component)
	{
		$component->accept($visitor);
	}
}

$components=[new ConcreteComponentA(),new ConcreteComponentB()];


echo "The client code works with all visitors via the base Visitor interface:<br/>";
$visitor1 = new ConcreteVisitor1();
clientCode($components, $visitor1);
echo "\n";

echo "It allows the same client code to work with different types of visitors:<br/>";
$visitor2 = new ConcreteVisitor2();
clientCode($components, $visitor2);
//https://refactoring.guru/ru/design-patterns/visitor/php/example
?>