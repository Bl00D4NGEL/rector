<?php

declare(strict_types=1);

namespace Rector\NodeTypeResolver\DependencyInjection;

use PHPStan\Analyser\NodeScopeResolver;
use PHPStan\Analyser\ScopeFactory;
use PHPStan\Analyser\TypeSpecifier;
use PHPStan\Dependency\DependencyResolver;
use PHPStan\DependencyInjection\Container;
use PHPStan\DependencyInjection\ContainerFactory;
use PHPStan\DependencyInjection\Type\OperatorTypeSpecifyingExtensionRegistryProvider;
use PHPStan\File\FileHelper;
use PHPStan\PhpDoc\TypeNodeResolver;
use PHPStan\Reflection\ReflectionProvider;
use Rector\Core\Configuration\Option;
use Rector\NodeTypeResolver\Reflection\BetterReflection\SourceLocatorProvider\DynamicSourceLocatorProvider;
use Symplify\PackageBuilder\Parameter\ParameterProvider;

/**
 * Factory so Symfony app can use services from PHPStan container
 * @see packages/NodeTypeResolver/config/config.yaml:17
 */
final class PHPStanServicesFactory
{
    /**
     * @var Container
     */
    private $container;

    public function __construct(ParameterProvider $parameterProvider)
    {
        $containerFactory = new ContainerFactory(getcwd());

        $additionalConfigFiles = [];
        $additionalConfigFiles[] = $parameterProvider->provideStringParameter(Option::PHPSTAN_FOR_RECTOR_PATH);
        $additionalConfigFiles[] = __DIR__ . '/../../config/phpstan/static-reflection.neon';
        $additionalConfigFiles[] = __DIR__ . '/../../config/phpstan/better-infer.neon';

        $existingAdditionalConfigFiles = array_filter($additionalConfigFiles, 'file_exists');

        $this->container = $containerFactory->create(sys_get_temp_dir(), $existingAdditionalConfigFiles, []);
    }

    /**
     * @api
     */
    public function createReflectionProvider(): Container
    {
        return $this->container->getByType(ReflectionProvider::class);
    }

    /**
     * @api
     */
    public function createNodeScopeResolver(): Container
    {
        return $this->container->getByType(NodeScopeResolver::class);
    }

    /**
     * @api
     */
    public function createTypeSpecifier(): Container
    {
        return $this->container->getByType(TypeSpecifier::class);
    }

    /**
     * @api
     */
    public function createScopeFactory(): Container
    {
        return $this->container->getByType(ScopeFactory::class);
    }

    /**
     * @api
     */
    public function createDependencyResolver(): Container
    {
        return $this->container->getByType(DependencyResolver::class);
    }

    /**
     * @api
     */
    public function createFileHelper(): Container
    {
        return $this->container->getByType(FileHelper::class);
    }

    /**
     * @api
     */
    public function createOperatorTypeSpecifyingExtensionRegistryProvider(): Container
    {
        return $this->container->getByType(OperatorTypeSpecifyingExtensionRegistryProvider::class);
    }

    /**
     * @api
     */
    public function createTypeNodeResolver(): Container
    {
        return $this->container->getByType(TypeNodeResolver::class);
    }

    /**
     * @api
     */
    public function createDynamicSourceLocatorProvider(): Container
    {
        return $this->container->getByType(DynamicSourceLocatorProvider::class);
    }
}
