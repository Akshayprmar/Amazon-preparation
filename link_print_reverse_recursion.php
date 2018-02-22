<?php
##link_print_reverse_recursion.php
Class Node
{
	Public $data;
	Public $next;
	function __construct($val)
	{
		$this->data=$val;
		$this->next=NULL;
	}
}
Class LinkList
{
	Public $root;
	Public $last;
	public $count;
	function __construct()
	{
		$this->root=NULL;
		$this->last=NULL;
		$this->count=0;
	}
	function Insert($data)
	{
		$nodedata= New Node($data);
		$this->count++;
		if($this->root==NULL)
		{
			$this->root=$nodedata;
			$this->last=$nodedata;
		}
		else
		{
			$this->last->next=$nodedata;
			$this->last=$nodedata;			
		}
	}
	function showdata($value)
	{
		$tmp=$value;
		if($tmp==NULL) return;
		echo $tmp->data.'---'; ## Just cut this line and paste below recursion function call and getting reverse data
		$this->showdata($tmp->next);

	}
	function reversedata($value)
	{
		## this function not change any value just showing reverse data.
		$tmp=$value;
		if($tmp==NULL) return;		
		$this->showdata($tmp->next);		
		echo $tmp->data.'---'; 
	}
	function reveserdata_change($tmp)
	{
		$head=$tmp;
		if($tmp->next==NULL)
		{
			echo 'hello';
			// $tmp->root=$tmp;
			$this->root=$tmp;
			// $this->last->next=NULL;
			echo '<pre>';print_r($tmp);
			return;
		}
		$this->reveserdata_change($tmp->next);
		// $q=$tmp->next;		
		// $q->next= $tmp;

		$tmp->next->next=$tmp;
		$tmp->next=NULL;
	}

}

$link=new LinkList();
for($i=0;$i<10;$i++)
{
	$link->Insert($i);
}
// echo '<pre>';print_r($link);
$link->showdata($link->root);
$link->reveserdata_change($link->root);
echo '<pre>';print_r($link);
?>