<?php

class feeds{
	
	public function query($from,$to)
	{
		$con = mysqli_connect("localhost","root","","test") or die('error');
		$query = "select * from data where id>$from and id<$to";
		$result = mysqli_query($con,$query);
		$count = mysqli_num_rows($result);
		$data = '';
		if($count>0)
		{
			while($row =mysqli_fetch_array($result))
			{
				$id = $row['id'];
				$feed = $row['feed'];
				$data = $data.'<blockquote><p>'.$feed.'</p></blockquote>';
			}
			$data=$data.'<div class="final" val="'.$id.'" ></div>';
			return $data;
		}
		else{
			echo '0';
		}
		
	}
	
	public function main()
	{
		if(isset($_POST['from']))
		{
			$from=$_POST['from'];
			$to = $from+11;
			$data = $this->query($from,$to);
			echo $data;
		}else
		{
			$data = $this->query(0,11);
			return $data;
		}
	}
	
}	

$obj = new Feeds();
$data = $obj->main();
?>