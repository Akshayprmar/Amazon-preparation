<?php
#find occurance of Array
##complexity o(logn)
$a=Array('1','1','2','2','3','3','3','4','4','4','4');
echo '<pre>';print_r($a);
$key=3;
echo $first=Binary_Search($a,count($a),$key,0);
echo '=======';
echo $last =Binary_Search($a,count($a),$key,1);

echo "occurance of count :-".($last-$first);
function Binary_Search($a,$n,$key,$check)
{
	$low=0;
	$high=$n-1;
	$result=-1;
	while($low<=$high)
	{
		$mid=round(($low+$high)/2);
		if($key==$a[$mid])
		{
			$result=$mid;
			if(!$check)
				$high=$mid-1;
			else
				$low=$mid+1;
		}
		elseif($key<$a[$mid])
		{
			$high=$mid-1;
		}
		else
			$low=$mid+1;
	}
	return $result;
}

?>
