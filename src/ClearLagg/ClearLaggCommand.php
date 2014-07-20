<?php
namespace ClearLagg;

use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginIdentifiableCommand;

class ClearLaggCommand extends Command implements PluginIdentifiableCommand{
    public $api;

    public function __construct(Loader $plugin){
        parent::__construct($plugin, "", "", "", ["lagg"]);
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

        return true;
    }
} 