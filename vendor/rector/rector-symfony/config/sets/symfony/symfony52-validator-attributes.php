<?php

declare (strict_types=1);
namespace RectorPrefix20210703;

use Rector\Php80\Rector\Class_\AnnotationToAttributeRector;
use Rector\Php80\ValueObject\AnnotationToAttribute;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\SymfonyPhpConfig\ValueObjectInliner;
// @see https://symfony.com/blog/new-in-symfony-5-2-constraints-as-php-attributes
return static function (\Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator $containerConfigurator) : void {
    $services = $containerConfigurator->services();
    $services->set(\Rector\Php80\Rector\Class_\AnnotationToAttributeRector::class)->call('configure', [[\Rector\Php80\Rector\Class_\AnnotationToAttributeRector::ANNOTATION_TO_ATTRIBUTE => \Symplify\SymfonyPhpConfig\ValueObjectInliner::inline([new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Bic', 'Symfony\\Component\\Validator\\Constraints\\Bic'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Blank', 'Symfony\\Component\\Validator\\Constraints\\Blank'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Callback', 'Symfony\\Component\\Validator\\Constraints\\Callback'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\CardScheme', 'Symfony\\Component\\Validator\\Constraints\\CardScheme'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Cascade', 'Symfony\\Component\\Validator\\Constraints\\Cascade'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Choice', 'Symfony\\Component\\Validator\\Constraints\\Choice'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Count', 'Symfony\\Component\\Validator\\Constraints\\Count'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Country', 'Symfony\\Component\\Validator\\Constraints\\Country'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Currency', 'Symfony\\Component\\Validator\\Constraints\\Currency'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Date', 'Symfony\\Component\\Validator\\Constraints\\Date'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\DateTime', 'Symfony\\Component\\Validator\\Constraints\\DateTime'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\DisableAutoMapping', 'Symfony\\Component\\Validator\\Constraints\\DisableAutoMapping'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\DivisibleBy', 'Symfony\\Component\\Validator\\Constraints\\DivisibleBy'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Email', 'Symfony\\Component\\Validator\\Constraints\\Email'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\EnableAutoMapping', 'Symfony\\Component\\Validator\\Constraints\\EnableAutoMapping'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\EqualTo', 'Symfony\\Component\\Validator\\Constraints\\EqualTo'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Expression', 'Symfony\\Component\\Validator\\Constraints\\Expression'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\ExpressionLanguageSyntax', 'Symfony\\Component\\Validator\\Constraints\\ExpressionLanguageSyntax'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\File', 'Symfony\\Component\\Validator\\Constraints\\File'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\GreaterThan', 'Symfony\\Component\\Validator\\Constraints\\GreaterThan'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\GreaterThanOrEqual', 'Symfony\\Component\\Validator\\Constraints\\GreaterThanOrEqual'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\GroupSequence', 'Symfony\\Component\\Validator\\Constraints\\GroupSequence'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\GroupSequenceProvider', 'Symfony\\Component\\Validator\\Constraints\\GroupSequenceProvider'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Hostname', 'Symfony\\Component\\Validator\\Constraints\\Hostname'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Iban', 'Symfony\\Component\\Validator\\Constraints\\Iban'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\IdenticalTo', 'Symfony\\Component\\Validator\\Constraints\\IdenticalTo'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Image', 'Symfony\\Component\\Validator\\Constraints\\Image'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Ip', 'Symfony\\Component\\Validator\\Constraints\\Ip'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Isbn', 'Symfony\\Component\\Validator\\Constraints\\Isbn'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\IsFalse', 'Symfony\\Component\\Validator\\Constraints\\IsFalse'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Isin', 'Symfony\\Component\\Validator\\Constraints\\Isin'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\IsNull', 'Symfony\\Component\\Validator\\Constraints\\IsNull'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Issn', 'Symfony\\Component\\Validator\\Constraints\\Issn'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\IsTrue', 'Symfony\\Component\\Validator\\Constraints\\IsTrue'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Json', 'Symfony\\Component\\Validator\\Constraints\\Json'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Language', 'Symfony\\Component\\Validator\\Constraints\\Language'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Length', 'Symfony\\Component\\Validator\\Constraints\\Length'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\LessThan', 'Symfony\\Component\\Validator\\Constraints\\LessThan'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\LessThanOrEqual', 'Symfony\\Component\\Validator\\Constraints\\LessThanOrEqual'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Locale', 'Symfony\\Component\\Validator\\Constraints\\Locale'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Luhn', 'Symfony\\Component\\Validator\\Constraints\\Luhn'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Negative', 'Symfony\\Component\\Validator\\Constraints\\Negative'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\NegativeOrZero', 'Symfony\\Component\\Validator\\Constraints\\NegativeOrZero'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\NotBlank', 'Symfony\\Component\\Validator\\Constraints\\NotBlank'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\NotCompromisedPassword', 'Symfony\\Component\\Validator\\Constraints\\NotCompromisedPassword'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\NotEqualTo', 'Symfony\\Component\\Validator\\Constraints\\NotEqualTo'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\NotIdenticalTo', 'Symfony\\Component\\Validator\\Constraints\\NotIdenticalTo'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\NotNull', 'Symfony\\Component\\Validator\\Constraints\\NotNull'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Positive', 'Symfony\\Component\\Validator\\Constraints\\Positive'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\PositiveOrZero', 'Symfony\\Component\\Validator\\Constraints\\PositiveOrZero'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Range', 'Symfony\\Component\\Validator\\Constraints\\Range'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Regex', 'Symfony\\Component\\Validator\\Constraints\\Regex'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Time', 'Symfony\\Component\\Validator\\Constraints\\Time'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Timezone', 'Symfony\\Component\\Validator\\Constraints\\Timezone'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Traverse', 'Symfony\\Component\\Validator\\Constraints\\Traverse'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Type', 'Symfony\\Component\\Validator\\Constraints\\Type'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Ulid', 'Symfony\\Component\\Validator\\Constraints\\Ulid'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Unique', 'Symfony\\Component\\Validator\\Constraints\\Unique'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Url', 'Symfony\\Component\\Validator\\Constraints\\Url'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Uuid', 'Symfony\\Component\\Validator\\Constraints\\Uuid'), new \Rector\Php80\ValueObject\AnnotationToAttribute('Symfony\\Component\\Validator\\Constraints\\Valid', 'Symfony\\Component\\Validator\\Constraints\\Valid')])]]);
};
