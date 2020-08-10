<?php

namespace MonoAdrian23\SuperPlot;

use pocketmine\command\Command;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\Server;
use pocketmine\command\CommandSender;
use pocketmine\command\ConsoleCommandSender;
use pocketmine\plugin\PluginBase;
use jojoe77777\FormAPI\SimpleForm;
use jojoe77777\FormAPI\CustomForm;
use MonoAdrian23\SuperPlot\forms\PAHForm;
use MonoAdrian23\SuperPlot\forms\PRHForm;
use MonoAdrian23\SuperPlot\forms\PDenyForm;
use MonoAdrian23\SuperPlot\forms\PUDenyForm;
use MonoAdrian23\SuperPlot\forms\PClearForm;
use MonoAdrian23\SuperPlot\forms\PGiveForm;
use MonoAdrian23\SuperPlot\forms\PAPCForm;


class Main extends PluginBase implements Listener{
	


    public function onEnable(){

        $this->getServer()->getLogger()->info("SuperPlot wurde aktiviert!");

    }

    

    public function onCommand(CommandSender $sender, Command $cmd, string $label, array $args) : bool {
		if($cmd->getName() == "sp"){
			$this->sp($sender);
		}
		return true;
	}

	

	public function sp($player) {
        $form = new SimpleForm(function (Player $player, int $data = null){
 

            $result = $data;
            if($result === null){
                return true;
            }
            switch($result){
            case 0:
            break;

            case 1:
            if ($data == 1) {
                $player->sendForm(new PAPCForm());
            }
            break;

            case 2:
            if ($data == 2) {
                $player->sendForm(new PAHForm());
            }
            break; 

            case 3:
            if ($data == 3) {
                $player->sendForm(new PRHForm());
            }
            break;

            case 4:
            if ($data == 4){
                $player->sendForm(new PDenyForm());
            }
            break;

            case 5:
            if ($data == 5){
                $player->sendForm(new PUDenyForm());
            }
            break;

            case 6:
            $player->getServer()->getCommandMap()->dispatch($player, "p clear confirm ".$data[0]);
            break;

            case 7:
            if ($data == 7){
                $player->sendForm(new PGiveForm());
            }
            break;


            }

 

        });

 

        $form->setTitle("§l§dSuperPlot");
        $form->setContent("Suche etwas aus");
        $form->addButton("§4Schließen");
        $form->addButton("§3Plothilfe");
        $form->addButton("§3Füge einen Helfer hinzu");
        $form->addButton("§3Entferne einen Helfer");
        $form->addButton("§3Banne einen Spieler vom Gs");
        $form->addButton("§3Entbanne einen Spieler vom Gs");
        $form->addButton("§3Cleare dein Gs");
        $form->addButton("§3Gebe dein Gs einen anderem Spieler");
        $form->sendToPlayer($player);
        return $form;

			}

		}