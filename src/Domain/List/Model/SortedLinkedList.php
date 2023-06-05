<?php

declare(strict_types=1);

namespace App\Domain\List\Model;

final class SortedLinkedList
{
	private ?ListItem $root = null;

	public function __toString(): string
	{
		$link = $this->root;
		$str = (string) $link?->getValue();
		while ($link?->getNext() instanceof ListItem) {
			$link = $link->getNext();
			$str .= ' » ';
			$str .= $link->getValue();
		}

		return $str;
	}

	public function append(ListItem $insert): void
	{
		if (!$this->root instanceof ListItem) {
			$this->root = $insert;
			return;
		}

		if ($insert->getValue() < $this->root->getValue()) {
			$insert->setNext($this->root);
			$this->root->setPrev($insert);
			$this->root = $insert;
			return;
		}

		$link = $this->root;

		while ($link->getNext() instanceof ListItem) {
			$link = $link->getNext();

			if ($insert->getValue() < $link->getValue()) {
				$prevLink = $link->getPrev();
				$prevLink?->setNext($insert);

				$link->setPrev($insert);
				$insert->setNext($link);
				$insert->setPrev($prevLink);
				return;
			}
		}

		$link->setNext($insert);
		$insert->setPrev($link);
	}
}
