<?php

namespace many1337;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use muqsit\invmenu\InvMenuHandler;
use pocketmine\Server;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\event\player\PlayerQuitEvent;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\Listeners;
use pocketmine\utils\TextFormat;

class Main extends PluginBase implements Listener {

	public function onEnable() {
    		$this->getServer()->getPluginManager()->registerEvents($this, $this);
    	}
    
    	public function onDisable() {
    		foreach($this->getServer()->getOnlinePlayers() as $p) {
			$p->transfer("80.99.208.62", "19150");
		}
   	}
    
    	public function onJoin(PlayerJoinEvent $event) {
    	
        	$player = $event->getPlayer();
        	$name = $player->getName();
        	$this->Main($player);
        	$event->setJoinMessage("§7[§9+§7] §9" . $name);
        	
    	}
    	
    	public function onQuit(PlayerQuitEvent $event) {
    	
        	$player = $event->getPlayer();
        	$name = $player->getName();
        	$event->setQuitMessage("§7[§c-§7] §c" . $name);
        	
    	}
    	
    	public function Main(Player $player) {
        	$player->getInventory()->clearAll();
        	$player->getInventory()->setItem(4, Item::get(345)->setCustomName(TextFormat::YELLOW."Navigator"));
        	$player->getInventory()->setItem(8, Item::get(399)->setCustomName(TextFormat::GREEN."Infos"));
            $player->getInventory()->setItem(0, Item::get(397 , 3)->setCustomName(TextFormat::AQUA."Profile"));

       }
    	
    	public function onInteract(PlayerInteractEvent $event) {
       		$player = $event->getPlayer();
        	$item = $player->getInventory()->getItemInHand();
        
        	if($item->getCustomName() == TextFormat::YELLOW . "Navigator") {
            		$menu = new Navigator($this);
             		$menu->Navigator($player);  
   
             	}

            if($item->getCustomName() == TextFormat::GREEN . "Lobbys") {
             
                 }
                 
           if($item->getCustomName() == TextFormat::AQUA . "Profil") {
                  $menu = new Profil($this);
             	    $menu->Profil($player);
             	    
	 }
  }
}
