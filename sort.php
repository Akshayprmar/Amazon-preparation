<?php

// function recur($i)
// {
// 	echo $i.'----<br>';
// 	$i++;
// 	if($i==10) return;
// 	recur($i);	
// 	echo $i.'*****<br>';
// }
// recur(1);
// die;
/**
* sorting Algorith
*/
class Sorting_algo
{
	
	function __construct($argument)
	{
		$this->length=count($argument);
	}
	function bubble_sort($arg)
	{
		
		for($i=0;$i<$this->length;$i++)
		{
			for($j=$this->length-1;$j>0;$j--)
			{
				if($arg[$j]<$arg[$j-1])
				{
					$min=$arg[$j];
					$arg[$j]=$arg[$j-1];
					$arg[$j-1]=$min;
				}
			}
		}
		return $arg;
	}
	function Selection_sort($arg)
	{
		for($i=0;$i<$this->length;$i++)
		{
			$min=$i;
			for($j=$i+1;$j<$this->length;$j++)
			{
				if($arg[$min]>$arg[$j])
					$min=$j;
			}
			if($i!=$min)
			{
				$min_v=$arg[$i];
				$arg[$i]=$arg[$min];
				$arg[$min]=$min_v;
			}
		}
		return $arg;
	}
	function insertation_sort($arg)
	{
		for($i=1;$i<$this->length;$i++)
		{
			$min=$arg[$i];
			$j=$i-1;
			
			while ($j>=0 && $arg[$j]>$min) {
				$arg[$j+1]=$arg[$j];
				# code...
				$j--;
			}
			$arg[$j+1]=$min;
		}
		return $arg;
	}
	function merge_sort($arg)
	{
		$count=count($arg);
		$left=$right=array();
		if($count==1) return $arg;
		$left=array_slice($arg, 0,$count/2);
		$right=array_slice($arg, $count/2);
		$left=$this->merge_sort($left);
		$right=$this->merge_sort($right);
		return $this->merge($left,$right);
	}
	function merge($left,$right)
	{
		while(count($left)>0 && count($right)>0)
		{
			if($left[0]>$right[0])
			{
				$res[]=$right[0];
				$right=array_slice($right, 1);
			}
			else
			{
				$res[]=$left[0];
				$left=array_slice($left, 1);
			}
		}
		while(count($left)>0)
		{
			$res[]=$left[0];
			$left=array_slice($left,1);
		}
		while(count($right)>0)
		{
			$res[]=$right[0];
			$right=array_slice($right, 1);
		}
		return $res;
	}
	function quicksort($arg)
	{
		$count=count($arg);
		$left=$right=Array();
		if($count<=1) return $arg;
		else
		{
			$pivot=$arg[0];

			for($i=0;$i<$count;$i++)
			{
				if($pivot>$arg[$i])
				{
					$left[]=$arg[$i];
				}
				elseif($pivot<$arg[$i])
					$right[]=$arg[$i];
			}
		}
		return array_merge($this->quicksort($left),array($pivot),$this->quicksort($right));
	}
}

/*

$lngw=strlen($chkw);
$lngc=strlen($chk);
$k=0;
for($i=0;$i<$lngc-$lengw;$i++)
{
    $chking='';
    for($j=$i;$j<$i+$lngw;$j++)
    {
        $chking.=$chk[$j];
    }
    if($chking==$chkw)
    {
        $k++;$i=$i+$lengw;
    }
}
echo $k."\n";

*/
$sort=Array('1','23','2','50','65','40','55');
$a=new Sorting_algo($sort);
$bubble=$a->bubble_sort($sort);
echo "<h2>bubble_sort<h2>";
echo '<pre>';print_r($bubble);


$select=$a->Selection_sort($sort);
echo "<h2>Selection_sort<h2>";
echo '<pre>';print_r($select);


$insertation=$a->insertation_sort($sort);
echo "<h2>insertation_sort<h2>";
echo '<pre>';print_r($insertation);

$quick=$a->quicksort($sort);
echo "<h2>Quick_sort<h2>";
echo '<pre>';print_r($quick);

$mergesort=$a->merge_sort($sort);
echo "<h2>Merge_sort<h2>";
echo '<pre>';print_r($mergesort);

?>