#!/usr/bin/php
<?php
	/*
		скрипт, который можно запустить из командной строки,
	        принимающий последовательность символов, разделенных запятой,
	        и определяющий является ли введенная последовательность прогрессией.
		# ./progression.php -1,-3,-5
	*/

	if(isset($argv[1])){
		$d = explode(',', $argv[1]);

		if(is_array($d)){
			if(count($d) > 2){
				$status = '';

				$t = 0;
				$s = abs($d[0] - $d[1]);
				if($s){
					for($i = 1, $c = count($d); $i < $c; $i ++){
						if($d[$i - 1] + $s == $d[$i] || $d[$i - 1] - $s == $d[$i]){
							$t ++;
						}
						else{
							break;
						}
					}

					if($t == $c - 1){
						$status = 'its a arithmetic progression';
					}
				}

				if(!$status){
					if($d[1] == 0){
						return trigger_error('arg 1 cant be 0');
					}

					$t = 0;
					$s = abs($d[0] / $d[1]);
					if($s){
						for($i = 1, $c = count($d); $i < $c; $i ++){
							if($d[$i - 1] * $s == $d[$i] || $d[$i - 1] / $s == $d[$i]){
								$t ++;
							}
							else{
								break;
							}
						}

						if($t == $c - 1){
							$status = 'its a geometric progression';
						}
					}
				}


				echo 'success: ' . ($status ? $status : 'its not a progression');
			}
			else{
				echo 'error: too small count';
			}
		}
		else{
			echo 'error: uncknown format of input';
		}
	}
	else{
		echo 'error: no data in argument';
	}

	echo PHP_EOL;
?>