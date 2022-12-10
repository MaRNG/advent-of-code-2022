<?php

class Ship
{
    /**
     * @var array<int, Stack>
     */
    private array $stacks = [];

    public function __construct(int $numberOfStacks)
    {
        for ($i = 0; $i < $numberOfStacks; $i++)
        {
            $this->stacks[$i + 1] = new Stack();
        }
    }

    public function getTopCrates(): array
    {
        $topCrates = [];

        foreach ($this->stacks as $stack) {
            $topCrates[] = $stack->getTopCrate();
        }

        return $topCrates;
    }

    public function getStack(int $id): Stack
    {
        return $this->stacks[$id];
    }
}