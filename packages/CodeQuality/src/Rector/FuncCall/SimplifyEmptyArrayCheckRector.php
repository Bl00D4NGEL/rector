<?php declare(strict_types=1);

namespace Rector\CodeQuality\Rector\FuncCall;

use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\Node\Expr\BinaryOp\BooleanAnd;
use PhpParser\Node\Expr\BinaryOp\Identical;
use PhpParser\Node\Expr\BinaryOp\NotIdentical;
use PhpParser\Node\Expr\BooleanNot;
use PhpParser\Node\Expr\Empty_;
use PhpParser\Node\Expr\FuncCall;
use Rector\Rector\AbstractRector;
use Rector\RectorDefinition\CodeSample;
use Rector\RectorDefinition\RectorDefinition;

final class SimplifyEmptyArrayCheckRector extends AbstractRector
{
    public function getDefinition(): RectorDefinition
    {
        return new RectorDefinition(
            'Simplify `is_array` and `empty` functions combination into a simple identical check for an empty array',
            [new CodeSample('is_array($values) && empty($values)', '$values === []')]
        );
    }

    /**
     * @return string[]
     */
    public function getNodeTypes(): array
    {
        return [BooleanAnd::class];
    }

    /**
     * @param BooleanAnd $booleanAndNode
     */
    public function refactor(Node $booleanAndNode): ?Node
    {
        $leftValue = $booleanAndNode->left;
        $rightValue = $booleanAndNode->right;
        if (! $this->isPreferableCheck($leftValue, $rightValue)) {
            return null;
        }

        if (! $rightValue instanceof BooleanNot && ! $leftValue instanceof BooleanNot) {
            /** @var FuncCall $variable */
            $variable = $leftValue instanceof Empty_ ? $leftValue->expr : $rightValue->expr;

            return new Identical($variable, new Array_());
        }

        $booleanNotExpr = $rightValue instanceof BooleanNot ? $rightValue->expr : $leftValue->expr;
        if (! $this->isName($booleanNotExpr, 'is_array') && ! $booleanNotExpr instanceof Empty_) {
            return null;
        }

        $variable = $booleanNotExpr->expr ?? $booleanNotExpr;

        return new NotIdentical($variable, new Array_());
    }

    public function isNoneOfPreferableNodes(Node $node): bool
    {
        return ! $this->isName($node, 'is_array') && ! $node instanceof Empty_ && ! $node instanceof BooleanNot;
    }

    private function isPreferableCheck(Node $firstNode, Node $secondNode): bool
    {
        if ($this->isNoneOfPreferableNodes($firstNode) || $this->isNoneOfPreferableNodes($secondNode)) {
            return false;
        }

        // special case
        if ($firstNode instanceof BooleanNot && $secondNode instanceof BooleanNot) {
            return false;
        }

        if ($firstNode instanceof Empty_ && $secondNode instanceof Empty_) {
            return false;
        }

        return true;
    }
}
