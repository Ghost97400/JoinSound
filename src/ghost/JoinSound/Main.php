<?php

namespace ghost\JoinSound;

use pocketmine\math\Vector3;
use pocketmine\player\Player;
use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\world\sound\EndermanTeleportSound;

class main extends PluginBase implements Listener {

    public function onEnable(): void{
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
    }

    public function onCommand(CommandSender $sender, Command $command, string $label, Array $args) : bool {

        switch($command->getName()){
            case "joinsound":
                if ($sender instanceof Player){
                    $sender->sendMessage("§4Plugin fais par my name is6758");
                }
        }
    return true;
    }

    public function onJoin(PlayerJoinEvent $event){
        $player = $event->getPlayer();
        $world = $player->getWorld();
        $x = $player->getPosition()->getX();
        $y = $player->getPosition()->gety();
        $z = $player->getPosition()->getz();


        $world->addSound(new Vector3($x, $y, $z), new EndermanTeleportSound($player));
    }
}