<?php
## Find value in Rotation Array
$a=array('11','12','25','112','132','133','10');
echo '<pre>';print_r($a);
$value=10;
echo Binary_search($a,count($a),$value);

function Binary_search($a,$cnt,$value)
{

	$low=0;
	$high=$cnt-1;
	while($low<=$high)
	{
		$mid=round(($low+$high)/2);
		if($a[$mid]==$value) return $mid;
		elseif($a[$mid]<=$a[$high])
		{
			if($value>$a[$mid] && $value<=$a[$high])
				$low=$mid+1;
			else
				$high=$mid-1;
		}
		else
		{
			if($a[$low]<=$value && $value<$a[$mid])
				$high=$mid-1;
			else
				$low=$mid+1;
		}
	}
}
?>