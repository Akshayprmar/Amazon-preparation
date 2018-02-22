<?php
##sprial print for 2 -D array
$a=Array(
array('1','2','3','4'),
array('5','6','7','8'),
array('12','11','10','9'),
array('13','14','15','16'),
array('17','18','19','20')
);
$row=count($a);
$col=count($a[0]);
Spiral_array($a,$row,$col);
function Spiral_array($a,$row,$col)
{
	$top=0;$bottom=$row-1;$left=0;$right=$col-1;
	$dir=0;
	while($top<=$bottom && $left<=$right)
	{
		
		if($dir==0)
		{
			for($i=$top;$i<=$right;$i++)
				echo $a[$top][$i].'---';
			$top++;
		}
		elseif($dir==1)
		{
			for($i=$top;$i<=$bottom;$i++)
			{
				echo $a[$i][$right].'---';				
			}
			$right--;			
		}
		elseif($dir==2)
		{
			for($i=$right;$i>=$left;$i--)
				echo $a[$bottom][$i].'---';

			$bottom--;
		}
		elseif($dir==3)
		{
			for($i=$bottom;$i>=$top;$i--)
			{
				echo $a[$i][$left].'---';
			}
			$left++;
		}
		$dir=($dir+1)%4;
	}
}
?>