<?php
namespace clearlagg;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;

class ClearLaggCommand extends Command implements PluginIdentifiableCommand{
    public $api;
    public function __construct(Loader $plugin){
        parent::__construct("clearlagg", "Clear the lag!", "/clearlagg help", ["lagg"]);
        $this->setPermission("clearlagg.command");
        $this->api = $plugin;
    }
    public function getPlugin(){
        return $this->api;
    }
    public function execute(CommandSender $sender, $alias, array $args){
        if(!$this->testPermission($sender)){
            return false;
        }
        switch($args[0]){
            case "clear":
                $sender->sendMessage("Removed " . $this->getPlugin()->removeEntities() . " entities");
                return true;
                break;
            case "check":
                $c = $this->getPlugin()->getEntityCount();
                $sender->sendMessage("There are " . $c[0] . "players, " . $c[1] . "mobs ,and " . $c[2] . "entities.");
                return true;
                break;
            case "reload":
                //TODO
                break;
            case "killmobs":
                $sender->sendMessage("Killed " . $this->getPlugin()->removeMobs() . " mobs.");
                return true;
                break;
            case "area":
                //TODO
                break;
            case "unloadchunks":
                //TODO
                break;
            case "chunk":
                //TODO
                break;
            case "tpchunk":
                //TODO
                break;
            default:
                $sender->sendMessage("I am helpful :)");
                return true;
                break;
        }
    }
} 