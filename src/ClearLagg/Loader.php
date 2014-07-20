<?php
namespace ClearLagg;

use pocketmine\entity\DroppedItem;
use pocketmine\entity\Entity;
use pocketmine\entity\Human;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
    public function onEnable(){

    }

    public function onDisable(){

    }

    /**           _____ _____
     *      /\   |  __ \_   _|
     *     /  \  | |__) || |
     *    / /\ \ |  ___/ | |
     *   / ____ \| |    _| |_
     *  /_/    \_\_|   |_____|
     */

    protected $exemptedEntities = [];

    public function removeEntities(){
        foreach($this->getServer()->getLevels() as $level){
            foreach($level->getEntities() as $entity){
                if(!$entity instanceof Human && !$this->isEntityExempted($entity)){
                    $entity->close();
                }
            }
        }
    }

    public function exemptEntity(Entity $entity){
        array_push($this->exemptedEntities, $entity->getID());
    }

    public function isEntityExempted(Entity $entity){
        $r = false;
        foreach($this->exemptedEntities as $e){
            if($entity->getID() === $e){
                $r = true;
            }
        }
        return $r;
    }
} 