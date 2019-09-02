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
 * Class Node
 */
abstract class Node implements NodeInterface, \JsonSerializable
{
    /**
     * @var int
     */
    public $type = 0;

    /**
     * @var int
     */
    public $offset = 0;

    /**
     * @return array
     */
    public function __debugInfo(): array
    {
        return $this->jsonSerialize();
    }

    /**
     * @return array
     */
    public function jsonSerialize(): array
    {
        return [
            'type'     => $this->getType(),
            'offset'   => $this->getOffset(),
            'children' => \iterator_to_array($this->getIterator(), false),
        ];
    }

    /**
     * @return int
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * @return int
     */
    public function getOffset(): int
    {
        return (int)$this->offset;
    }
}
