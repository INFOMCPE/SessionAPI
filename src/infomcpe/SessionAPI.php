<?php
namespace infomcpe;

use pocketmine\plugin\PluginBase;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\utils\Utils;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\event\Listener;
use pocketmine\plugin\Plugin;
use pocketmine\Server;
use pocketmine\plugin\PluginDescription;

class SessionAPI extends PluginBase {
   	
    public function onLoad(){
	}

	public function onEnable(){
                @mkdir('Session');
		 if ($this->getServer()->getPluginManager()->getPlugin("PluginDownloader")) {
                          $this->getServer()->getScheduler()->scheduleAsyncTask(new CheckVersionTask($this, 321)); 
                        }
    }

	public function onDisable(){
            @rmdir('Session');
	}
        public function createSession($id, $tip, $data) {
             $Sfile = (new Config("Session/".strtolower($id).".json", Config::JSON))->getAll(); 
             $Sfile[$tip] = $data; 
            $Ffile = new Config("Session/".strtolower($id).".json", Config::JSON); 
            $Ffile->setAll($Sfile); 
            $Ffile->save(); 
}
        public function getSessionData($id, $tip) {
            $Sfile = (new Config("Session/".strtolower($id).".json", Config::JSON))->getAll(); 
        return $Sfile[$tip]; 
        }
        public function deleteSession($id) {
            @unlink("Session/{$id}.json");
        }


}
    



            
  

	
    

?>
