<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Doctrine\Set\DoctrineSetList;
use Rector\PHPUnit\Set\PHPUnitSetList;
use Rector\Set\ValueObject\SetList;
use Rector\Symfony\Rector\Class_\ChangeFileLoaderInExtensionAndKernelRector;
use Rector\Symfony\Set\SymfonySetList;

return static function (RectorConfig $rectorConfig): void {
    $rectorConfig->paths([
        __DIR__ . '/config',
        __DIR__ . '/src',
        __DIR__ . '/tests',
    ]);

    $rectorConfig->phpVersion(PhpVersion::PHP_82);
    $rectorConfig->importNames();
    $rectorConfig->sets([
        SetList::ACTION_INJECTION_TO_CONSTRUCTOR_INJECTION,
        SetList::CODE_QUALITY,
        SetList::CODING_STYLE,
        SetList::DEAD_CODE,
        SetList::EARLY_RETURN,
        SetList::PHP_81,
        SetList::PRIVATIZATION,
        SetList::PSR_4,
        SetList::TYPE_DECLARATION,
        DoctrineSetList::DOCTRINE_25,
        DoctrineSetList::DOCTRINE_BEHAVIORS_20,
        DoctrineSetList::DOCTRINE_CODE_QUALITY,
        DoctrineSetList::DOCTRINE_COMMON_20,
        DoctrineSetList::DOCTRINE_DBAL_30,
        DoctrineSetList::DOCTRINE_ORM_29,
        SymfonySetList::SYMFONY_60,
        SymfonySetList::SYMFONY_61,
        SymfonySetList::SYMFONY_62,
        PHPUnitSetList::PHPUNIT_100,
        SymfonySetList::SYMFONY_CODE_QUALITY,
    ]);

    $rectorConfig->ruleWithConfiguration(ChangeFileLoaderInExtensionAndKernelRector::class, [
        ChangeFileLoaderInExtensionAndKernelRector::FROM => 'yaml',
        ChangeFileLoaderInExtensionAndKernelRector::TO => 'php',
    ]);
};
