<?php
    namespace App\Models;
    use App\Enums\UserRole;
    use Illuminate\Database\Eloquent\Relations\BelongsToMany;

    class Player extends User {
        protected $table="users";
        protected static function booted() : void{
            static::addGlobalScope('player', function($query) {
                $query->where('role', UserRole::Player->value);
            });
            static::creating(function(Player $player) {
                $player->role ??= UserRole::Player->value;
            });
        }
        public function matches(): BelongsToMany
        {
            return $this->belongsToMany(
                GameMatch::class,
                'match_player',
                'player_id',
                'match_id',
            )->withTimestamps();
        }
    }