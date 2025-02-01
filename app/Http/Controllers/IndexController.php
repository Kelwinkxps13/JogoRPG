<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    function index(){
        return view('main');
    }
    function combat(){
        return view('fastcombat');
    }
    function map(){
        return view('map');
    }
    function inventory(){
        return view('inventory');
    }
    function enemy1(){
        return view('combat');
    }
    function acao($player, $enemy) {
        $rodadas_efeito_arma = 0;
        $count_rodadas = 1;
        $efeito_arma = false;
        $quantidade_de_vezes_que_pode_usar_o_efeito = $player->arma->quantidade_de_vezes_que_pode_usar;
    
        while ($player->hp_atual > 0 && $enemy->hp_atual > 0) {
            if ($rodadas_efeito_arma == 0 && $efeito_arma) {
                echo "O efeito da arma {$player->arma->name} acabou!\n";
                $player->desativar_efeito_arma();
                $efeito_arma = false;
            }
    
            echo "\n#########################################################\n\n";
    
            if ($efeito_arma) {
                echo "Rodadas restantes do efeito da arma: {$rodadas_efeito_arma}\n";
            }
    
            echo "Rodada: $count_rodadas\n";
            echo "\nnv{$player->level->atual_level}\n";
            echo "xp: {$player->level->atual_xp}/{$player->level->xp_next_level}\n";
            echo "\nArma atual: {$player->arma->name}\n";
            echo "Taxa crítica: {$player->arma->taxa}%\n";
            echo "Dano crítico: {$player->arma->dano}%\n";
            echo "Ataque base: {$player->arma->atk_base}\n";
            echo "\nHP {$player->name}: {$player->hp_atual}/{$player->hp_base}\n";
            echo "HP {$enemy->name}: {$enemy->hp_atual}/{$enemy->hp_base}\n";
            echo "\n#########################################################\n\n";
    
            echo "[1] Atacar\n";
            echo "[2] Efeito de arma\n";
            $choice = trim(fgets(STDIN));
    
            if ($choice == "1") {
                system('clear');
                $player->fight($enemy);
    
                if ($rodadas_efeito_arma > 0 && $efeito_arma) {
                    $rodadas_efeito_arma--;
                }
    
                $count_rodadas++;
    
                if ($enemy->hp_atual <= 0) {
                    echo "Você ganhou!\n";
                    echo "Total de rodadas: $count_rodadas\n";
                    return false;
                } else {
                    $enemy->fight($player);
                    if ($player->hp_atual <= 0) {
                        echo "Você perdeu!\n";
                        echo "Total de rodadas: $count_rodadas\n";
                        return true;
                    }
                }
            } elseif ($choice == "2") {
                system('clear');
    
                while (true) {
                    echo "\n#########################################################\n\n";
                    echo "Descrição: {$player->arma->descricao_efeito}\n";
                    echo "Pode usar esse efeito {$quantidade_de_vezes_que_pode_usar_o_efeito} vezes\n";
                    echo "[1] Ativar\n";
                    echo "[2] Voltar\n";
                    $choice = trim(fgets(STDIN));
    
                    if ($choice == "1" && $quantidade_de_vezes_que_pode_usar_o_efeito > 0) {
                        if ($rodadas_efeito_arma > 0) {
                            system('clear');
                            echo "O efeito já está ativo!\n";
                        } else {
                            system('clear');
                            $rodadas_efeito_arma = $player->arma->tempo;
                            $efeito_arma = true;
                            $quantidade_de_vezes_que_pode_usar_o_efeito--;
                            $player->ativar_efeito_arma();
                            echo "Efeito foi ativado!!\n";
                            break;
                        }
                    } elseif ($choice == "1" && $quantidade_de_vezes_que_pode_usar_o_efeito == 0) {
                        system('clear');
                        echo "Não pode mais usar esse efeito!\n";
                    } elseif ($choice == "2") {
                        system('clear');
                        break;
                    } else {
                        system('clear');
                    }
                }
            } else {
                system('clear');
            }
        }
    }
}
