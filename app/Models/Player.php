<?php
    namespace App\Models;
    use App\Enums\UserRole;
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
    }