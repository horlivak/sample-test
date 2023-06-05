<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\ControlStructure\YodaStyleFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Operator\NotOperatorWithSuccessorSpaceFixer;
use PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocAnnotationRemoveFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitInternalClassFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitStrictFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitTestClassRequiresCoversFixer;
use Symplify\EasyCodingStandard\Config\ECSConfig;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ECSConfig $ecsConfig): void {

	$ecsConfig->paths([
		__DIR__ . '/src',
		__DIR__ . '/tests',
	]);

	$ecsConfig->sets([
		SetList::ARRAY,
		SetList::CLEAN_CODE,
		SetList::COMMENTS,
		SetList::COMMON,
		SetList::CONTROL_STRUCTURES,
		SetList::DOCBLOCK,
		SetList::DOCTRINE_ANNOTATIONS,
		SetList::NAMESPACES,
		SetList::PHPUNIT,
		SetList::PSR_12,
		SetList::SPACES,
		SetList::STRICT,
		SetList::SYMPLIFY,

	]);


	$ecsConfig->skip([
		PhpUnitInternalClassFixer::class,
		PhpUnitTestClassRequiresCoversFixer::class,
		GeneralPhpdocAnnotationRemoveFixer::class,
		NotOperatorWithSuccessorSpaceFixer::class,
		PhpUnitStrictFixer::class,
	]);

	$ecsConfig->indentation(Option::INDENTATION_TAB);
	$ecsConfig->parallel();

	$ecsConfig->ruleWithConfiguration(ConcatSpaceFixer::class, [
		'spacing' => 'one',
	]);

	$ecsConfig->ruleWithConfiguration(YodaStyleFixer::class, [
		'equal' => false,
		'identical' => false,
		'less_and_greater' => false,
	]);
};
