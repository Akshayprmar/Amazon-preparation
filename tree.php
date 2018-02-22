<?php
## create tree
Class node
{
	public $info;
	public $left;
	public $right;
	public $level;
	function __construct($val)
	{
		$this->info=$val;
		$this->left=NUll;
		$this->right=NUll;
		$this->level=NULL;
	}
}
Class tree
{
	public $root;
	function __construct()
	{
		$this->root=Null;
	}
	function Insert($info)
	{
		$nodeval=new node($info);
		if($this->root==Null)
		{
			$this->root=$nodeval;
		}
		else
		{
			$current=$this->root;
			while(1)
			{
				if($info<$current->info)
				{
					if($current->left)
					{
						$current=$current->left;
					}
					else
					{
						$current->left=$nodeval;
						break;
					}					
				}
				else if ($info>$current->info)
				{
					if($current->right)
						$current=$current->right;
					else
					{
						$current->right=$nodeval;
						break;
					}
					
				}
				else break;

			}
		}
		
	}
	function trevese($case)
	{
		switch ($case) {
			case 'inorder':
					$this->inorder($this->root);
				break;
			case 'postorder':
					$this->postorder($this->root);
				break;
			case 'preorder':
			$this->preorder($this->root);
			break;
			case 'bredth':
			$this->BFT();
			break;
			case 'boundry':
			$this->treeBoundry();
			break;
		}

	}
	function inorder($current)
	{
		if(	$current->left)
			$this->inorder($current->left);
		echo $current->info.'---';
		if($current->right)
			$this->inorder($current->right);
	}
	function preorder($current)
	{
		echo $current->info.'---';
		if(	$current->left)
			$this->preorder($current->left);
		if($current->right)
			$this->preorder($current->right);
	}
	function postorder($current)
	{
		
		if(	$current->left)
			$this->postorder($current->left);
		if($current->right)
			$this->postorder($current->right);
		echo $current->info.'---';
	}
	function BFT()
	{
		$node=$this->root;
		$node->level=1;
		$queue = array($node);
		$current_level=$node->level;
		$out=array('<br>');
		while (count($queue)>0)
		{
			$current_node=array_shift($queue);
			if($current_node->level>$current_level)
			{
				$current_level++;
				array_push($out,'<br>');
			}
			array_push($out, $current_node->info.'---');
			if($current_node->left)
			{
				$current_node->left->level=$current_level+1;
				array_push($queue, $current_node->left);
			}
			if($current_node->right)
			{
				$current_node->right->level=$current_level+1;
				array_push($queue, $current_node->right);
			}	
		}
		echo join($out,""); 
	}
	function treeBoundry()
	{
		$node=$this->root;
		if($node)
		{
			echo $node->info.'---';
			## Right node Print
			// $this->leftnode($node->left);
			## left node Print
			$this->rightnode($node->right);
			##  print Leaf node Print
			// $this->leafnode($node->left);
			$this->leafnode($node->right);
		}
	}
	function leftnode($node)
	{
		if($node->left)
		{
			$leftnode=$node;
			echo $leftnode->info.'----';
			$this->leftnode($leftnode->left);
		}
		elseif($node->right)
		{
			$leftnode=$node;
			echo $leftnode->info.'----';
			$this->leftnode($leftnode->right);
		}
		
	}
	function rightnode($node)
	{
		if($node->right)
		{
			$rightnode=$node;
			echo $rightnode->info.'----';
			$this->rightnode($rightnode->right);	
		}
		else if($node->left)
		{
			$rightnode=$node;
			echo $rightnode->info.'----';
			$this->rightnode($rightnode->left);
		}
		
	}
	function leafnode($node)
	{
		if($node)
		{
			$this->leafnode($node->left);
			if(!($node->left) && !($node->right))
				echo $node->info.'----';
			$this->leafnode($node->right);
		}
	}
}

$binarytree=new tree();
$binarytree->Insert(10);
$binarytree->Insert(6);
$binarytree->Insert(4);
$binarytree->Insert(8);
$binarytree->Insert(14);
$binarytree->Insert(12);
$binarytree->Insert(16);
$binarytree->Insert(13);
// $binarytree->Insert(12);
// $binarytree->Insert(11);
// $binarytree->Insert(19);

// echo '<pre>';print_r($binarytree);
$binarytree->trevese('inorder');
echo '<br>';
$binarytree->trevese('preorder');
echo '<br>';
$binarytree->trevese('postorder');

echo '<br>';
$binarytree->trevese('bredth');

echo '<br> boundry <br>';
$binarytree->trevese('boundry');
?>
