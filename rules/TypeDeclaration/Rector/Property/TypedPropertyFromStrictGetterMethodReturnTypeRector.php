<?php

declare (strict_types=1);
namespace Rector\TypeDeclaration\Rector\Property;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Stmt\Property;
use PHPStan\Analyser\Scope;
use PHPStan\Reflection\ClassReflection;
use PHPStan\Type\Type;
use PHPStan\Type\TypeCombinator;
use Rector\Core\Rector\AbstractRector;
use Rector\NodeTypeResolver\Node\AttributeKey;
use Rector\PHPStanStaticTypeMapper\Enum\TypeKind;
use Rector\TypeDeclaration\TypeInferer\PropertyTypeInferer\GetterTypeDeclarationPropertyTypeInferer;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;
/**
 * @see \Rector\Tests\TypeDeclaration\Rector\Property\TypedPropertyFromStrictGetterMethodReturnTypeRector\TypedPropertyFromStrictGetterMethodReturnTypeRectorTest
 * @todo make generic
 */
final class TypedPropertyFromStrictGetterMethodReturnTypeRector extends \Rector\Core\Rector\AbstractRector
{
    /**
     * @var \Rector\TypeDeclaration\TypeInferer\PropertyTypeInferer\GetterTypeDeclarationPropertyTypeInferer
     */
    private $getterTypeDeclarationPropertyTypeInferer;
    public function __construct(\Rector\TypeDeclaration\TypeInferer\PropertyTypeInferer\GetterTypeDeclarationPropertyTypeInferer $getterTypeDeclarationPropertyTypeInferer)
    {
        $this->getterTypeDeclarationPropertyTypeInferer = $getterTypeDeclarationPropertyTypeInferer;
    }
    public function getRuleDefinition() : \Symplify\RuleDocGenerator\ValueObject\RuleDefinition
    {
        return new \Symplify\RuleDocGenerator\ValueObject\RuleDefinition('Complete property type based on getter strict types', [new \Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample(<<<'CODE_SAMPLE'
final class SomeClass
{
    public $name;

    public function getName(): string|null
    {
        return $this->name;
    }
}
CODE_SAMPLE
, <<<'CODE_SAMPLE'
final class SomeClass
{
    public ?string $name;

    public function getName(): string|null
    {
        return $this->name;
    }
}
CODE_SAMPLE
)]);
    }
    /**
     * @return array<class-string<Node>>
     */
    public function getNodeTypes() : array
    {
        return [\PhpParser\Node\Stmt\Property::class];
    }
    /**
     * @param Property $node
     */
    public function refactor(\PhpParser\Node $node) : ?\PhpParser\Node\Stmt\Property
    {
        if ($node->type !== null) {
            return null;
        }
        if ($this->isGuardedByParentProperty($node)) {
            return null;
        }
        $getterReturnType = $this->getterTypeDeclarationPropertyTypeInferer->inferProperty($node);
        if (!$getterReturnType instanceof \PHPStan\Type\Type) {
            return null;
        }
        $propertyType = $this->staticTypeMapper->mapPHPStanTypeToPhpParserNode($getterReturnType, \Rector\PHPStanStaticTypeMapper\Enum\TypeKind::PROPERTY());
        if ($propertyType === null) {
            return null;
        }
        $node->type = $propertyType;
        $this->decorateDefaultNull($getterReturnType, $node);
        return $node;
    }
    private function decorateDefaultNull(\PHPStan\Type\Type $propertyType, \PhpParser\Node\Stmt\Property $property) : void
    {
        if (!\PHPStan\Type\TypeCombinator::containsNull($propertyType)) {
            return;
        }
        $propertyProperty = $property->props[0];
        if ($propertyProperty->default instanceof \PhpParser\Node\Expr) {
            return;
        }
        $propertyProperty->default = $this->nodeFactory->createNull();
    }
    private function isGuardedByParentProperty(\PhpParser\Node\Stmt\Property $property) : bool
    {
        $propertyName = $this->getName($property);
        $scope = $property->getAttribute(\Rector\NodeTypeResolver\Node\AttributeKey::SCOPE);
        if (!$scope instanceof \PHPStan\Analyser\Scope) {
            return \false;
        }
        $classReflection = $scope->getClassReflection();
        if (!$classReflection instanceof \PHPStan\Reflection\ClassReflection) {
            return \false;
        }
        foreach ($classReflection->getParents() as $parentClassReflection) {
            if ($parentClassReflection->hasProperty($propertyName)) {
                return \true;
            }
        }
        return \false;
    }
}
