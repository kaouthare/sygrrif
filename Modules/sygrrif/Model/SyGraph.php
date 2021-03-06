<?php

require_once 'Framework/ModelGRR.php';

/**
 * Class defining the Sygrrif graph model
 *
 * @author Sylvain Prigent
 */
class SyGraph extends ModelGRR {

	public function getYearNumResGraph($year){
		
		$num = 0;
		$numTotal = 0;
		for ($i = 1; $i <= 12; $i++) {
			$dstart= mktime(0,0,0,$i,1,$year); // Le premier jour du mois en cours
			$dend= mktime(0,0,0,$i+1,0,$year); // Le 0eme jour du mois suivant == le dernier jour du mois en cour
		
			//$q = array('start'=>$dstart, 'end'=>$dend);
			$sql = 'SELECT * FROM grr_entry WHERE start_time >= ? AND end_time <= ? ORDER BY id';
			$req = $this->runRequest($sql, array($dstart, $dend));
			
			$num = $req->rowCount(); // Nombre de réservations dans la période sélectionnée
			$numTotal += $num;
			$graph[$i]=$num;
		}
		
		$graphData = array('numTotal' => $numTotal, 'graph' => $graph);
		return $graphData;
	}
	
	public function getCamembertContent($year, $numTotal){
		$sql = 'SELECT DISTINCT room_id FROM grr_entry WHERE start_time >='.mktime(0,0,0,1,1,$year).' AND end_time <='.mktime(0,0,0,1,0,$year+1).' ORDER by room_id';
		$req = $this->runRequest($sql);
		$numMachinesFormesTotal = $req->rowCount(); // Nombre de personnes distinctes formées dans la période sélectionnée
		$machinesFormesListe = $req->fetchAll();
		
		$i = 0;
		$numMachinesFormes=array();
		$angle = 0;
		$departX = 300+250*cos(0);
		$departY = 300-250*sin(0);
		
		$test  = '<g fill="rgb(97, 115, 169)">';
		$test .= '<title>Réservations</title>';
		$test .= '<desc>287</desc>';
		$test .= '<rect x="0" y="0" width="1000" height="600" fill="white" stroke="black" stroke-width="0"/>';
		$couleur = array("#FC441D","#FE8D11","#FCC212","#FFFD32","#D0E92B","#53D745","#6AC720","#156947","#291D81","#804DA4","#E4AADF","#A7194B","#FE0000");
		foreach($machinesFormesListe as $mFL) {
			$sql = 'SELECT * FROM grr_entry WHERE start_time >='.mktime(0,0,0,1,1,$year).' AND end_time <='.mktime(0,0,0,1,0,$year+1).' AND room_id ="'.$mFL[0].'"';
			$req = $this->runRequest($sql);
			$numMachinesFormes[$i][0] = $mFL[0];
			$numMachinesFormes[$i][1] = $req->rowCount();
		
			$angle += 2*pi()*$numMachinesFormes[$i][1]/$numTotal;
			$arriveeX = 300+250*cos($angle);
			$arriveeY = 300-250*sin($angle);
				
			$test .= '<path d="M '.$departX.' '.$departY.' A 250 250 0 0 0 '.$arriveeX.' '.$arriveeY.' L 300 300" fill="'.$couleur[$i].'" stroke="black"/>';
			$test .= '<g>';
			$test .= '<rect x="580" y="'.(83+40*$i).'" width="30" height="20" rx="5" ry="5" fill="'.$couleur[$i].'" stroke="'.$couleur[$i].'" stroke-width="0"/>';
				
			$sql = 'SELECT room_name FROM grr_room WHERE id ="'.$mFL[0].'"';
			$req = $this->runRequest($sql);
			$res = $req->fetchAll();
			$nomMachine = $res[0][0];
				
			$test .= '<text x="615" y="'.(90+40*$i).'" font-size="25" fill="black" stroke="none" text-anchor="start" baseline-shift="-11px">'.$nomMachine.' : '.$numMachinesFormes[$i][1].'</text>';
			$test .= '</g>';
		
		
			$departX = $arriveeX;
			$departY = $arriveeY;
			$i++;
		}
		
		$test .= '</g>';
		return $test;
		
	}
	
}

