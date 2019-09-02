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

/**
 * A simple AST node implementation.
 */
class Rule extends Node
{
    /**
     * @var array|NodeInterface[]
     */
    public $children;

    /**
     * Rule constructor.
     *
     * @param int $type
     * @param array|NodeInterface[] $children
     * @param int $offset
     */
    public function __construct(int $type, array $children = [], int $offset = 0)
    {
        $this->type = $type;
        $this->children = $children;
        $this->offset = $offset;
    }

    /**
     * @return \Traversable|NodeInterface[]
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->children);
    }

    /**
     * @param string $property
     * @param NodeInterface|null $value
     * @return void
     */
    public function __set(string $property, ?NodeInterface $value)
    {
        if ($value === null) {
            unset($this->children[$property]);
        } else {
            $this->children[$property] = $value;
        }
    }
}
