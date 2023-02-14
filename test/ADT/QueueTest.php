<?php

namespace Braddle\PhpUk2023\ADT;

use PHPUnit\Framework\TestCase;

class QueueTest extends TestCase
{
	public Queue $sut;

	protected function setUp(): void
	{
		parent::setUp();

		$this->sut = new Queue();
	}

	public function testIsEmpty()
	{
		$this->assertTrue( $this->sut->isEmpty() );
	}

	public function testIsNotEmpty()
	{
		$this->sut->push( 'one' );
		$this->assertFalse( $this->sut->isEmpty() );
	}

	public function testContainsOneElement()
	{
		$this->sut->push( 'one' );
		$this->assertSame( 1, $this->sut->count() );
	}

	public function testContainsTwoElements()
	{
		$this->sut->push( 'one' );
		$this->sut->push( 'two' );
		$this->assertSame( 2, $this->sut->count() );
	}

	public function testPopReturnsTheOnlyElement()
	{
		$this->sut->push( 'one' );
		$this->assertSame( 'one', $this->sut->pop() );
	}

	public function testReturnsTheLastInsertedElement()
	{
		$this->sut->push( 'one' );
		$this->sut->push( 'two' );
		$this->assertSame( 'one', $this->sut->pop() );
		$this->assertSame( 'two', $this->sut->pop() );
	}

	public function testReturnsTheLastInsertedElementInSequence()
	{
		$this->sut->push( 'one' );
		$this->sut->push( 'two' );
		$this->sut->pop();
		$this->sut->pop();

		$this->sut->push( 'three' );
		$this->sut->push( 'four' );
		$this->assertSame( 'three', $this->sut->pop() );
		$this->assertSame( 'four', $this->sut->pop() );
	}

	public function testCountRemainsConsistent() {
		$this->sut->push( 'one' );
		$this->sut->push( 'two' );
		$this->sut->pop();
		$this->sut->pop();
		$this->assertSame( 0, $this->sut->count() );
	}

	public function testCountRemainsConsistent2() {
		$this->sut->push( 'one' );
		$this->sut->push( 'two' );
		$this->sut->pop();
		$this->sut->pop();
		$lastElement = $this->sut->push( 'three' );
		$this->assertSame( 1, $this->sut->count() );
		$this->assertSame( 'three', $this->sut->pop() );
	}
}
