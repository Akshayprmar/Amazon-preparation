<?php
##reverse Link-list using interative 
class Node
{
	public $data;
	public $next;	
	function __construct($val)
	{
		$this->data=$val;
		$this->next=NULL;
	}
}

class Linklist
{
	public $root;
	public $last;
	public $count;
	function __construct()
	{
		$this->root=NULL;
		$this->last=NULL;
		$this->count=0;
	}
	function insert($data)
	{		
		$d=New Node($data);
		$this->count++;
		if($this->root==NULL)
		{
			$this->root=$d;
			$this->last=$d;
		}
		else
		{
			$this->last->next=$d;
			$this->last=$d;
		}
	}
	function reverse($val)
	{
		$tmp=$val;		
		$prev=NULL;
		while($tmp->next!=NULL)
		{
			$next=$tmp->next;
			$tmp->next=$prev;
			$prev=$tmp;
			$tmp=$next;
		}
		$val=$prev;
		echo '<pre>';print_r($val);
	}
}

$a=new Linklist();

for($i=0;$i<10;$i++)
{
	$a->insert($i);
}
// echo '<pre>';print_r($a);
$a->reverse($a->root);
// echo '<pre>';print_r($a);
?>