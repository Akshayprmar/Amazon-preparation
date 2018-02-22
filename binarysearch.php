<?php
## fird first occurance of array
## find last occureance of array

$a=Array('1','2','3','4','5','5','5','7','8','10','24');

$count=count($a);
$find_value=5;
echo BinarySearch($a,$count,$find_value);
function BinarySearch($a,$count,$val)
{
	$cnt=$count;	
	$low=0;
	$hight=$cnt-1;
	$result=-1;
	while($low<=$hight)
	{
		$mid =round(($low+$hight)/2);
		echo $a[$mid].'=='.$val;		
		if($a[$mid]==$val)
		{
			$result=$mid;
			// $hight=$mid-1;
			$low=$mid+1;
			// return $mid;
		}
		else if($a[$mid]>$val)
		{
			$hight=$mid-1;
			echo 'moto';
			echo '<br>';
		}
		else
			$low=$mid+1;
	}
	return $result;
}
?>