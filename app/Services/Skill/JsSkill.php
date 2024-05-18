<?php

namespace App\Services\Skill;

class JsSkill implements SkillContract
{
    protected SkillContract $skills;

    public function __construct(SkillContract $skills)
    {
        $this->skills = $skills;
    }

    public function getList(): array
    {
        $items = $this->skills->getList();

        $items[] = 'js';

        return array_unique($items);
    }
}
