<?php
## Reverse String Problem Using stacks
$string="My name is Akshay";
Reverse($string);
function Reverse($str)
{
	$final=Array();
	for($i=0;$i<strlen($str);$i++)
	{
		array_push($final, $str[$i]);
	}
	for($i=0;$i<strlen($str);$i++)
	{
		echo array_pop($final);
	}
	echo '<pre>';print_r($final);

}

## balance parenthasis Problems:
$string="[{()([])}]";
Reverse1($string);
function Reverse1($str)
{
	$final=Array();
	$match=array('['=>']','('=>')','{'=>'}');
	echo '<pre>';print_r($match);
	$j=-1;
	for($i=0;$i<strlen($str);$i++)
	{
		if($str[$i]=='[' || $str[$i]=='{'||$str[$i]=='(')
		{
			array_push($final, $str[$i]);
			$j++;
		}
		elseif($str[$i]==']' || $str[$i]=='}'||$str[$i]==')')
		{
			if($match[$final[$j]]==$str[$i])
			{
				array_pop($final);
				$j--;
			}
		}		
	}
	if(count($final))
		echo 'NOT Balanced';
		else
		echo 'Balanced';	
	echo '<pre>';print_r($final);

}

?>