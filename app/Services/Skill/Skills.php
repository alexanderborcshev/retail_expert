<?php

namespace App\Services\Skill;

class Skills implements SkillContract
{
    private array $items = [];

    public function getList(): array
    {
        return $this->items;
    }
}