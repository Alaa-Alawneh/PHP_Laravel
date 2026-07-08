<?php
    namespace App\Enums;
    enum UserRole: string {
        case Trainer = "trainer";
        case Player = "player";

        public function label(): string {
            return match ($this) {
                self::Trainer => "Trainer",
                self::Player => "Player",
                };
            
        }
        public function dashboardRoute(): string {
            return match ($this) {
                self::Trainer => "trainer.dashboard",
                self::Player => "player.dashboard",
            };
        }
    }

?>