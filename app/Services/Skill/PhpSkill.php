<?php

namespace App\Services\Skill;

class PhpSkill implements SkillContract
{
    protected SkillContract $skills;

    public function __construct(SkillContract $skills)
    {
        $this->skills = $skills;
    }

    public function getList(): array
    {
        $items = $this->skills->getList();

        $items[] = 'php';

        return array_unique($items);
    }
}
