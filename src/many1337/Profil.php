<?php

namespace many1337;

use pocketmine\inventory\transaction\action\SlotChangeAction;
use pocketmine\item\Item;
use pocketmine\Player;
use pocketmine\utils\TextFormat as TF;
use pocketmine\utils\TextFormat as Color;

use muqsit\invmenu\InvMenuHandler;
use muqsit\invmenu\InvMenu;

class Profil {

        private $plugin;
        private $prefix = "";
        // ComingSoon UI 
    public function __Construct(Main $plugin){
        $this->plugin = $plugin;
        
        if (!InvMenuHandler::isRegistered()) {
            InvMenuHandler::register($plugin);
        }

    }

    public function Profil(Player $player)
    {
        $menu = InvMenu::create(InvMenu::TYPE_CHEST);
        
        $menu->readonly();
        $menu->setName(TF::GRAY . "» " . TF::GREEN . "Player Status" . TF::GRAY . " «");

        $co= Item::get(266, 0, 1);
        $co->setCustomName(TF::RESET . TF::GOLD . "Coins");
        
        $pl = Item::get(372, 0, 1);
        $pl->setCustomName(TF::RESET . TF::GOLD . "Profil");
        
        $cs = Item::get(137, 0, 1);
        $cs->setCustomName(TF::RESET . TF::GOLD . "Custom Server");
        
        $air = Item::get(160, 0, 1);
        $air->setCustomName("");
	
	    $air1 = Item::get(160, 15, 1);
        $air1->setCustomName("");

        $inv = $menu->getInventory();
        
     $inv->setItem(0, $air);
	 $inv->setItem(1, $air1);
	 $inv->setItem(2, $air);
	 $inv->setItem(3, $air1);
	 $inv->setItem(4, $air);
	 $inv->setItem(5, $air1);
	 $inv->setItem(6, $air);
	 $inv->setItem(7, $air1);
	 $inv->setItem(8, $air);
	 
  $inv->setItem(9, $air1);
     $inv->setItem(10, $air);
     $inv->setItem(11, $pl);
     $inv->setItem(12, $air);
     $inv->setItem(13, $cs);
     $inv->setItem(14, $air);
     $inv->setItem(15, $co);
     $inv->setItem(16, $air);
     $inv->setItem(17, $air1);
        
	 $inv->setItem(18, $air);
	 $inv->setItem(19, $air1);
	 $inv->setItem(20, $air);
	 $inv->setItem(21, $air1);
	 $inv->setItem(22, $air);
	 $inv->setItem(23, $air1);
	 $inv->setItem(24, $air);
	 $inv->setItem(25, $air1);
	 $inv->setItem(26, $air);
	
	    $menu->setListener([$this, "onTransaction"]);
        $menu->setListener(function(player $player, item $itemClickedOn, Item $itemClickedwith): bool{
             $name = $player->getName();
             
             if($itemClickedOn->getCustomName() == TF::RESET . TF::GOLD . "Profil"){
            
              $player->sendMessage(TF::DARK_RED."Soon..."); 
              
            }
            
            if($itemClickedOn->getCustomName() == TF::RESET . TF::GOLD . "Custom Server"){
            
              $player->sendMessage(TF::DARK_RED."Soon..."); 
              
            }
         
         if($itemClickedOn->getCustomName() == TF::RESET . TF::GOLD . "Coins"){
            
              $player->addTitle(TF::RED."Soon...!"); 
              
            }
              
            return true;
        });

        $menu->send($player);
    }
    
    public function onTransaction(Player $player, Item $itemTakenOut, Item $itemPutIn, SlotChangeAction $inventoryAction) : bool{

        $player->removeWindow($inventoryAction->getInventory());

        return true;
   }
}
