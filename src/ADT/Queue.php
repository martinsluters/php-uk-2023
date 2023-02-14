<?php

namespace Braddle\PhpUk2023\ADT;

class Queue
{
	private int $count = 0;
	private array $queue = [];
	private int $nextElementIndex = 0;
	public function isEmpty(): bool {
		return ! $this->count;
	}

	public function push( string $value ) : void {
		$this->queue[] = $value;
		$this->count++;
	}

	public function count() : int {
		return $this->count;
	}

	public function pop(): string {
		$this->count--;
		return $this->queue[ $this->nextElementIndex++ ];
	}


}
