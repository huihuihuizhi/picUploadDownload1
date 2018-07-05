<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>图片的上传和下载</title>
	</head>
	<body>
		<center>		  
		<h2>图片的上传和下载</h2>
		<form action="doupload.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="MAX_FILE_SIZE" value="100000" />
		上传图片：<input type="file" name="pic">
		  	<input type="submit" value="上传"><br><br>
		 	</form>
		 	
		<table border="0" width="400">
			<tr>
				<th>序号</th>
				<th>图片</th>
				<th>添加时间</th>
				<th>操作</th>
			</tr>
			<?php
			//打开目录upload
			$dir = opendir("./upload");
			//遍历目录，输出里面的图片信息
			$i=0;
			while($f = readdir($dir)){
				if($f!="." && $f!=".."){
				$i++;
				echo "<tr>";
					echo "<td align='left'>{$i}</td>";
					echo "<td><img src='./upload/{$f}' width='70'></td>";
					echo "<td>".@date("Y-m-d",filectime("./upload/".$f))."</td>";
					echo "<td><a href='./upload/{$f}'>查看</a> 
						      <a href='download.php?name={$f}'>下载</a></td>";					
				echo "</tr>";
				}
			}	
			//3.关闭目录
			closedir($dir);
			?>
		</table>
	
		</center>
	</body>
</html>
