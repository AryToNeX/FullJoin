<?php

namespace FullJoin;

use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\event\player\PlayerKickEvent;

class Main extends PluginBase implements Listener{

  public function onEnable(){
    $this->getServer()->getPluginManager()->registerEvents($this, $this);
    $this->getLogger()->info(TextFormat::GREEN . "FullJoin enabled!");
  }
  
  public function onDisable(){
    $this->getLogger()->info(TextFormat::RED . "FullJoin disabled!");
  }
  
  public function onPlayerKick(PlayerKickEvent $event){
    if($event->getPlayer()->hasPermission("fulljoin.join") and $event->getReason() === "disconnectionScreen.serverFull")
      $event->setCancelled(true);
  }
}
