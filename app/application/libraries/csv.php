<?php
include_once APPPATH . 'libraries/logger.php';

/* 
 * 
 *BEFORE USING THIS FUNCTION READ THIS:
 * 
 *Both data and columname have to be an array.
 *Every element of the array data also have to be an array.
 *$columname is not obligatory.
 *The separator defaults to ',' but it can be changed if needed.
 *The name will be incremented with a timestamp and .csv

  Suggested way to use the function: 			
  try{
  	arrayToCSV($this->Logger,...);
  } catch(Exception $e){
	echo "<script>alert('Problema ao gerar csv, tente novamente mais tarde');</script>";
  }
*/

function arrayToCSV($logger, $name, $data, $columname = array(),$separator = ";") {
	$logger -> info("Starting " . __METHOD__);

	$date = date('Y-n-j H:i:s', time());

	$name = "$name-[$date].csv";

	$write = "";

	if (is_array($columname)) {
		$count = 0;
		$last = count($columname) - 1;
		foreach ($columname as $toPrint) {
			$print = utf8_decode($toPrint);
			if ($count++ < $last) {
				$print .= $separator;
			} else {
				$print .= "\n";
			}
			$write .= $print;
		}
	} else {
	//	$logger -> error("Columname array was not an array.");
	//	throw new Exception("Columname array was not an array.");
	//	return -1;
	}

	if (is_array($data)) {
		foreach ($data as $line) {
			if (!is_array($line)) {
				$logger -> error("One of the elements of the data array was not an array, aborting.");
				throw new Exception("One of the elements of the data array was not an array, aborting.");
				return -1;
			} else {
				$count = 0;
				$last = count($line) - 1;
				foreach ($line as $toPrint) {
					$print = utf8_decode($toPrint);
					if ($count++ < $last) {
						$print .= $separator;
					} else {
						$print .= "\n";
					}
					$write .= $print;
				}
			}
		}
	} else {
		$logger -> error("Data array from arrayToCSV was not an array");
		throw new Exception("Data array from arrayToCSV was not an array");
		return -1;
	}
	
	$logger->info("CSV $name created with sucess, serving it now.");
		
	header("Content-type:text/csv; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$name\"");
	echo $write;	
}

function arrayToTXT($logger, $name, $data, $columname = array(),$separator = ";") {
	$logger -> info("Starting " . __METHOD__);

	$date = date('Y-n-j H:i:s', time());

	$name = "$name-[$date].txt";

	$write = "";

	if (is_array($columname)) {
		$count = 0;
		$last = count($columname) - 1;
		foreach ($columname as $toPrint) {
			$print = utf8_decode($toPrint);
			if ($count++ < $last) {
				$print .= $separator;
			} else {
				$print .= "\n";
			}
			$write .= $print;
		}
	} else {
		//$logger -> error("Columname array was not an array.");
		//throw new Exception("Columname array was not an array.");
		//return -1;
	}

	if (is_array($data)) {
		foreach ($data as $line) {
			if (!is_array($line)) {
				$logger -> error("One of the elements of the data array was not an array, aborting.");
				throw new Exception("One of the elements of the data array was not an array, aborting.");
				return -1;
			} else {
				$count = 0;
				$last = count($line) - 1;
				foreach ($line as $toPrint) {
					$print = utf8_decode($toPrint);
					if ($count++ < $last) {
						$print .= $separator;
					} else {
						$print .= "\n";
					}
					$write .= $print;
				}
			}
		}
	} else {
		$logger -> error("Data array from arrayToCSV was not an array");
		throw new Exception("Data array from arrayToCSV was not an array");
		return -1;
	}

	$logger->info("CSV $name created with sucess, serving it now.");

	header("Content-type:text/csv; charset=utf-8");
	header("Content-Disposition: attachment; filename=\"$name\"");
	echo $write;
}
?>
