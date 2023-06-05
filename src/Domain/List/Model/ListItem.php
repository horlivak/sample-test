<?php

declare(strict_types=1);

namespace App\Domain\List\Model;

final class ListItem
{
	public function __construct(
		private readonly int $value,
		private ?self $prev = null,
		private ?self $next = null,
	) {
	}

	public function __toString(): string
	{
		return (string) $this->value;
	}

	public function getValue(): int
	{
		return $this->value;
	}

	public function getPrev(): ?self
	{
		return $this->prev;
	}

	public function getNext(): ?self
	{
		return $this->next;
	}

	public function setPrev(?self $prev): void
	{
		$this->prev = $prev;
	}

	public function setNext(?self $next): void
	{
		$this->next = $next;
	}
}
