<?php

namespace Checkout\Discount;

use Checkout\Cart\Line;

abstract class DecoratorAction
{
    /** @var DecoratorAction */
    protected $next_action;

    public function __construct(DecoratorAction $a_decorator_action = null)
    {
        $this->next_action = $a_decorator_action;
    }

    abstract protected function executeAction(Line $line);

    protected function shouldExecuteAction(Line $line): bool
    {
        return true;
    }

    public function __invoke(Line $line): ?float
    {
        if ($this->shouldExecuteAction($line))
        {
            return $this->executeAction($line);
        }

        return $this->next($line);
    }

    protected function next(Line $line): ?float
    {
        if (!is_null($this->next_action))
        {
            return $this->next_action->__invoke($line);
        }

        return null;
    }
}
