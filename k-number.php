<?php
$a=array('50','2','30','15','12');
$wnt=3;
$lengh=count($a);
for($i=0;$i<$wnt;$i++)
{
	$m=$i;
	for($j=$i+1;$j<$lengh;$j++)
	{
		// echo $a[$j].'--'.$max.'<br>';
		if($a[$m]<$a[$j])
		{
			// echo 'done';
			$m=$j;		
		}
	}
	if($m!=$j)
	{
		$max=$a[$i];
		$a[$i]=$a[$m];
		$a[$m]=$max;	
	}
	
	echo '<br>'.$a[$i];
}
echo '<pre>';print_r($a);
?>