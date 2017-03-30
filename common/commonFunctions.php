<?php

	function convertStatus($status) {
		if($status==0) { // not returned
			return "X";
		} else if($status==1) { //partially retunred
			return "&#9651";
		} else if($status==2) { // returned
			return "O";
		}
	}

	function convertDateToString($date, $target) {
		$dd = substr($date,8,2);		
		$mm = substr($date,5,2);
		$yy = substr($date,0,4);
		return $dd.'/'.$mm.'/'.$yy;
	}

	function bringDate($date) {
		$dd = substr($date,8,2);
		return $dd;
	}

	function bringMonth($date) {		
		$mm = substr($date,5,2);
		return $mm;
	}

	function bringYear($date) {	
		$yy = substr($date,0,4);
		return $yy;
	}

	function setLockinTitle($secret, $title, $name, $Name) {
		if($secret == 1) {
			if($Name != $name && $Name != 'Lim') {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/> Only Admin and Writer can Access';
			} else {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/>'.$title;
			}			
		} else {
			echo $title;
		}
	}

	function setLockinName($secret, $name, $Name) {
		if($secret == 1) {
			if($Name != $name && $Name != 'Lim') {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/> Secret User';
			} else {
				echo '<img src="../img/lock.png" style="vertical-align:middle;"/>'.$name;
			}
		} else {
			echo $name;
		}
	}
?>