<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Services\Skill\GoSkill;
use App\Services\Skill\JavaSkill;
use App\Services\Skill\JsSkill;
use App\Services\Skill\PhpSkill;
use App\Services\Skill\Skills;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    const COUNT_SKILL = 4;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $appends = [
        'description',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function getDescriptionAttribute(): array
    {
        $skills = new Skills();
        $skillDecorators = $this->getSkillDecorators();
        for ($i = 0; $i < self::COUNT_SKILL; $i++) {
            $skills = (new $skillDecorators[array_rand($skillDecorators)]($skills));
        }

        return $skills->getList();
    }

    private function getSkillDecorators(): array
    {
        return [
            GoSkill::class,
            JsSkill::class,
            JavaSkill::class,
            PhpSkill::class,
        ];
    }
}
