<html>
<head>
<meta content="text/html; charset=utf-8" />

<title>获得网页源代码
</title>

</head>
<body style='background:rgb(0,155,255)'>
<script>
function submi()
{
 var text=document.getElementById("path")
 document.getElementById("other").value="20"
 document.getElementById("form1").submit();
}
</script>
<?php
header("Content-type: text/html; charset=utf-8"); 
if(isset($_REQUEST['path']))
{
    $url=$_REQUEST['path'];
    ?>
     <div align="center">
        <form action="" method="post" id='form1'>
               <input type="text" name="path" id="path" width="50%"  value=<?php echo $url;?>/>
	       <input type="submit"/>
               <input type="button" onclick="submi()" value="other" />
               <input type="hidden" id='other' name='other' value="10"/>
               
        </form>
    </div>
<HR>
<HR>
<div>
    <textaero>
        <?php 
        $htmltext = file_get_contents($url);
        $encode = mb_detect_encoding($htmltext, array("ASCII","UTF-8","GB2312","GBK","BIG5")); 
        $htmltext = mb_convert_encoding($htmltext,"UTF-8",$encode); 
        

        if(isset($_REQUEST['other']) && $_REQUEST['other']=="20")
		{
			echo $htmltext;
		}
		else
		{
			echo "<xmp>";
			echo $htmltext;
			echo "</xmp>";
		}
        ?>
    </textaero>
    <div>
    <?php
}
else
{
    ?>
    <div align="center">
        <form action="" method="post">
               <input type="text" name="path" id="path" width="50%"/>
               <input type="submit"/>
	       <input type="button" onclick="submi()" value="other" />
               <input type="hidden" id='other' name='other' value="10"/>
        </form>
    </div>
    <?php
}

?>

</body>












		