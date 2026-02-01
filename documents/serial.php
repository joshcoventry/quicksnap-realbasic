<?php
	function serial($key2) {
		$key1 = "QuickSnap";
		define("scerealcharacters", "T1H3KY1RZV54JF1X21UNO421CG3D1WB9SIPM6QAL3E78");
		$scerealbits = array();
		$icerealbitslen = strlen(scerealcharacters) - 1;
		for ($i = 0; $i <= $icerealbitslen; $i++)
			array_push($scerealbits, substr(scerealcharacters, $i, 1));
		$icerealkey = array(5, 3, 20, 16, 0, 11, 18, 24, 9, 0, 1, 31, 35, 18, 0, 6, 4, 29, 25, 0, 3, 14, 23, 30);
		$skey = strtoupper($key1.$key2);
		$e = strlen($skey);
		$ikey = array();
		for ($i = 0; $i < $e; $i++) {
			$s = substr($skey, $i, 1);
			$x = array_search($s, $scerealbits);
			if ($x !== false)
				array_push($ikey, $x); 
		}
		if (count($ikey) == 0)
			array_push($ikey, 1);
		$x = 0;
		$k = 0;
		$u = count($ikey) - 1;
		while ($e > $icerealbitslen)
			$e -= $icerealbitslen;
		$scereal = array();
		for ($i = 0; $i < count($icerealkey); $i++) {
			if ($icerealkey[$i] == 0)
				array_push($scereal, "-");
			else {
				$k = $icerealkey[$i] + $ikey[$x] + $e;
				while ($k > $icerealbitslen)
					$k -= $icerealbitslen;
				array_push($scereal, $scerealbits[$k]);
				$x++;
				if ($x > $u)
					$x = 0;
			}
		}
		return implode("", $scereal);
	}
?>