<?php

declare(strict_types=1);

namespace App\Domain\List\Command;

use App\Domain\List\Model\ListItem;
use App\Domain\List\Model\SortedLinkedList;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

#[AsCommand('list:test')] final class SortedLinkedListCommand extends Command
{
	/**
	 * @throws InvalidArgumentException
	 */
	protected function configure(): void
	{
		$this->addArgument('values', InputArgument::IS_ARRAY, 'Separate multiple names with a space');
	}

	/**
	 * @throws InvalidArgumentException
	 */
	protected function execute(InputInterface $input, OutputInterface $output): int
	{
		/** @var string[] $values */
		$values = $input->getArgument('values');

		$list = new SortedLinkedList();
		foreach ($values as $value) {
			$list->append(new ListItem((int) $value));
		}

		$output->writeln((string) $list);

		return Command::SUCCESS;
	}
}
