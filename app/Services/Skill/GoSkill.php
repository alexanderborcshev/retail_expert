<?php

namespace App\Services\Skill;

class GoSkill implements SkillContract
{
    protected SkillContract $skills;

    public function __construct(SkillContract $skills)
    {
        $this->skills = $skills;
    }

    public function getList(): array
    {
        $items = $this->skills->getList();

        $items[] = 'golang';

        return array_unique($items);
    }
}
