<?php
###how many count rotatioin of array
$a=array('11','12','25','112','132','133','10');
echo '<pre>';print_r($a);
echo Binary_search($a,count($a));
function Binary_search($a,$cnt)
{

	$low=0;$high=$cnt-1;
	while($low<=$high)
	{
		$mid=round(($low+$high)/2);
		if($a[$low]<=$a[$high])
		{
			return $low;
		}
		elseif($a[$mid]<$a[$mid+1] && $a[$mid]<$a[$mid-1])
			return $mid;
		elseif($a[$mid]<=$a[$high])
		{
			$high=$mid-1;
		}
		elseif($a[$mid]>=$a[$low])
			$low=$mid+1;

	}

}
?>