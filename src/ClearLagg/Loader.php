<?php
namespace ClearLagg;

use pocketmine\entity\DroppedItem;
use pocketmine\entity\Entity;
use pocketmine\entity\Creature;
use pocketmine\plugin\PluginBase;

class Loader extends PluginBase{
    protected $exemptedEntities = [];
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

    public function removeEntities(){
        foreach($this->getServer()->getLevels() as $level){
            foreach($level->getEntities() as $entity){
                if(!$this->isEntityExempted($entity) && !($entity instanceof Creature)){
                    $entity->close();
                }
            }
        }
    }
    public function removeMobs(){
        foreach($this->getServer()->getLevels() as $level){
            foreach($level->getEntities() as $entity){
                if(!$this->isEntityExempted($entity) && $entity instanceof Creature){
                    $entity->close();
                }
            }
        }
    }
    public function exemptEntity(Entity $entity){
        $this->exemptedEntities[$entity->getID()] = $entity;
    }
    
    public function isEntityExempted(Entity $entity){
        return isset($this->exemptedEntities[$entity]);
    }
} 
