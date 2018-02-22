
<?php
//simple array_shift example
//$stack = array("orange", "banana", "apple", "raspberry");
//$fruit = array_shift($stack);
//print_r($stack);
//print_r($fruit);

class Node {
	  public $info;
	  public $left;
	  public $right;
	  public $level;
	  public function __construct($info) {
			 $this->info = $info;
			 $this->left = NULL;
			 $this->right = NULL;
			 $this->level = NULL;
	  }
	  public function __toString() {
			 return "$this->info";
	  }
}  
class SearchBinaryTree {
	  public $root;
	  public function  __construct() {
			 $this->root = NULL;
	  }

	  public function create($info) {
		  
			 if($this->root == NULL) {
				$this->root = new Node($info);
			 } else {

				$current = $this->root;
				while(true) {
					  if($info < $current->info) {
					 
							if($current->left) {
							   $current = $current->left;
							} else {
							   $current->left = new Node($info);
							   break;
							}
					  } else if($info > $current->info){
							if($current->right) {
							   $current = $current->right;
							} else {
							   $current->right = new Node($info);
							   break; 
							}
					  } else {
						break;
					  }
				}
			 }
	  }
	  public function traverse($method,$data='') {
			 switch($method) {
				 case 'inorder':
				 $this->_inorder($this->root);
				 break;
				 case 'postorder':
				 $this->_postorder($this->root);
				 break;

				 case 'preorder':
				 $this->_preorder($this->root);
				 break;
				 
				 case 'boundry':
				 $this->_boundry($this->root);
				 break;
				 
				 case 'mirror':				 
				 //echo '<pre>';print_r($this->root);
				 $this->_mirrorImage($this->root);
				 //echo '<pre>';print_r($this->tree1->root);
				 break;
				 
				 case 'mirror1':	
				 $this->i=0;			 
				 $this->_mirrorImage1($data->root);				 
				 break;
				 
				 default:
				 break;
			 }
	  }
	  private function _inorder($node) {
					  if($node->left) {
						 $this->_inorder($node->left);
					  }
					  echo $node. " ";
					  if($node->right) {
						 $this->_inorder($node->right); 
					  } 
	  }
	  private function _preorder($node) {
					  echo $node. " ";
					  if($node->left) {
						 $this->_preorder($node->left);
					  }
					  if($node->right) {
						 $this->_preorder($node->right);
					  }
	  }
	  private function _postorder($node) {
					  if($node->left) {
						 $this->_postorder($node->left);
					  } 
					  if($node->right) {
						 $this->_postorder($node->right);
					  }
					  echo $node. " ";
	  }
	  private function _boundry($node)
	  {
		 if($node)
		 {
			echo $node. " ";
	 
			// Print the left boundary in top-down manner.
			$this->_boundryleft($node->left);			
	 
			// Print all leaf nodes
			$this->_boundryleaves($node->left);
			$this->_boundryleaves($node->right);
	 
			// Print the right boundary in bottom-up manner
			 $this->_boundryright($node->right);
		}	 
	  }
	  // Find Left nodes of a binary tree
	  private function _boundryleft($node)
	  {
		  if($node->left) {
			  echo $node. " ";
			 $this->_boundryleft($node->left);
			 
		  }
		  else if($node->right) {			 
			 echo $node. " "; 
			 $this->_boundryleft($node->right);			 
		  }	  
	  }
	  // Find Right nodes of a binary tree
	  private function _boundryright($node)
	  {
		  if($node->right) {			 	
			 $this->_boundryright($node->right);
			 echo $node. " ";
		  }
		  else if($node->left) {			  
			 $this->_boundryright($node->left);
			 echo $node. " ";
		  }
	  }
	// Find leaf nodes of a binary tree
	private function _boundryleaves($node)
	{
		if ($node)
		{
			$this->_boundryleaves($node->left);			
	 
			// Print it if it is a leaf node
			if ( !($node->left)  &&  !($node->right) )
				echo $node. " ";
	 
			$this->_boundryleaves($node->right);
		}
	}
	private function _mirrorImage($node)
	{		
		if (!$node)
		{
			return NULL;
		}	
		else {			
			$this->_mirrorImage($node->left);
			$this->_mirrorImage($node->right);		 
			// swap the pointers in this node
			//$temp        = $node->left;
			//$node->left  = $node->right;
			//$node->right = $temp;
			//$temp        = $node->left;
			
			$this->tree1->root	    = new Node($node->info);			
			$this->tree1->root->left  = $node->right;
			$this->tree1->root->right = $node->left;			
		}
		//return $tree1;	
	}
	private function _mirrorImage1($node)
	{
		//echo '<pre>';	print_r($node);		
		if (!$node)
		{
			return NULL;
		}	
		else 
		{		
			$this->_mirrorImage1($node->left);
			echo '<pre>';print_r($node);
			echo '+++++++++++';
			$this->_mirrorImage1($node->right);
			echo '<pre>';print_r($node);
			echo '+++++++++++';
			
			
			die;
			// swap the pointers in this node
			//$temp        = $node->left;
			//$node->left  = $node->right;
			//$node->right = $temp;
			//$temp        = $node->left;
			//echo $i++;
			//if($i==1) return;
			$this->root	    = new Node($node->info);
			if($node->right)
				$this->root->left  = $node->right;
			if($node->left)	
			$this->root->right = $node->left;
			//echo '<pre>';	print_r($this->root	);
			//echo $this->i++;
			if($i==1) return;
		
		}
		//return $tree1;	
	}
	public function BFT() {
			 $node = $this->root;
			 
			 $node->level = 1; 
			 $queue = array($node);
			 $out = array("<br/>");
			 $current_level = $node->level;

			 while(count($queue) > 0) {
				   $current_node = array_shift($queue);
				   if($current_node->level > $current_level) {
						$current_level++;
						array_push($out,"<br/>");  
				   } 
				   array_push($out,$current_node->info. " ");
				   if($current_node->left) {
					  $current_node->left->level = $current_level + 1;
					  array_push($queue,$current_node->left); 
				   }    
				   if($current_node->right) {
					  $current_node->right->level = $current_level + 1;
					  array_push($queue,$current_node->right); 
				   }    
			 }			
			return join($out,""); 
	  }
}
		   $arr = array(8,3,1,6,4,7,10,14,13);
		   $tree = new SearchBinaryTree();
		   for($i=0,$n=count($arr);$i<$n;$i++) {
			   $tree->create($arr[$i]);
		   }
		   //echo '<pre>';print_r($tree);
		   
$str = <<<INTRO
 In computer science, a binary search tree (BST) is a node-based binary tree structure which has the following
properties:
<ul>
<li>the left subtree of a node contains only nodes with keys less than the node's key</li>
<li>the right subtree of a node contains only nodes with keys greater than the node's key</li>
<li>both the left and right subtrees must also be binary search trees</li>
</ul> 
INTRO;

echo"<h1>Binary Search Tree</h1>"; 
echo"<p>$str</p>"; 
echo "<h2>Input vector: ", join($arr," "), "</h2>";
echo"<h1>Breadh-First Traversal Tree</h1>"; 
echo $tree->BFT();
echo"<h3>Tree - Inorder</h3>"; 
$tree->traverse('inorder');
echo"<h3>Tree - Postorder</h3>"; 
$tree->traverse('postorder');
echo"<h3>Tree - Preorder</h3>";
$tree->traverse('preorder');
echo"<h3>Tree - Boundry</h3>";
$tree->traverse('boundry');



echo"<h3>Tree - Mirror</h3>";
$tree1 = new SearchBinaryTree();
$tree1->traverse('mirror1',$tree);
//echo '<pre>';print_r($tree1);
echo $tree1->BFT();

?>

index.php
Displaying index.php.