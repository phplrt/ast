<?php
/**
 * This file is part of phplrt package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
declare(strict_types=1);

namespace Phplrt\Ast;

use Phplrt\Contracts\Ast\NodeInterface;
use Phplrt\Contracts\Lexer\TokenInterface;

/**
 * Class Leaf
 */
class Leaf extends Node
{
    /**
     * @var string
     */
    public $value;

    /**
     * Leaf constructor.
     *
     * @param int $type
     * @param TokenInterface $token
     */
    public function __construct(int $type, TokenInterface $token)
    {
        $this->type = $type;
        $this->value = $token->getValue();
        $this->offset = $token->getOffset();
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return \Traversable|NodeInterface[]
     */
    public function getIterator(): \Traversable
    {
        return new \EmptyIterator();
    }
}
