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
final class TreeNode extends Node
{
    use MutableAttributesTrait;

    /**
     * @var array|NodeInterface[]
     */
    protected $children = [];

    /**
     * Anonymous constructor.
     *
     * @param int $type
     * @param int $offset
     * @param array|NodeInterface[] $children
     */
    public function __construct(int $type, int $offset, array $children = [])
    {
        parent::__construct($type, [self::ATTR_OFFSET => $offset]);

        $this->children = $children;
    }

    /**
     * @return \Traversable|NodeInterface[]
     */
    public function getIterator(): \Traversable
    {
        return new \ArrayIterator($this->children);
    }
}
