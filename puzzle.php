<html>
<?php
include "generator.php";
?>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript">
var r=0;var c=0;var error=0;var re=0;var ce=0;var complete=0;var seconds=0;var minute=0;var interval;var name1;var mode;
var ids=[["#1","#2","#3","#4","#5","#6","#7","#8","#9"],["#10","#11","#12","#13","#14","#15","#16","#17","#18"],["#19","#20","#21","#22","#23","#24","#25","#26","#27"],["#28","#29","#30","#31","#32","#33","#34","#35","#36"],["#37","#38","#39","#40","#41","#42","#43","#44","#45"],["#46","#47","#48","#49","#50","#51","#52","#53","#54"],["#55","#56","#57","#58","#59","#60","#61","#62","#63"],["#64","#65","#66","#67","#68","#69","#70","#71","#72"],["#73","#74","#75","#76","#77","#78","#79","#80","#81"]]
var ids2=[["1","2","3","4","5","6","7","8","9"],["10","11","12","13","14","15","16","17","18"],["19","20","21","22","23","24","25","26","27"],["28","29","30","31","32","33","34","35","36"],["37","38","39","40","41","42","43","44","45"],["46","47","48","49","50","51","52","53","54"],["55","56","57","58","59","60","61","62","63"],["64","65","66","67","68","69","70","71","72"],["73","74","75","76","77","78","79","80","81"]]
var classes=[".a1",".a2",".a3",".a4",".a5",".a6",".a7",".a8",".a9"];
function timeit()
{
	seconds=seconds+1;
	if(seconds==60)
	{
		seconds=0;
		minute=minute+1;
	}
	if(seconds<10)
	{
		var strseconds="0"+seconds;
	}
	else
	{
		var strseconds=seconds;
	}
	if(minute<10)
	{
		var strminute="0"+minute;
	}
	else
	{
		var strminute=minute;
	}
	document.getElementById("demo").innerHTML=strminute+":"+strseconds+"";
}
function removeError()
{
	if(error==1)
	{
		document.getElementById(ids2[r][c]).innerHTML=" ";
		$(ids[r][c]).css({"background-color":"#FFFF00"});
		error=0;
	}
}
function isSafe(num)
{
	var i=0;var j=0;
	for(i=0;i<9;i++)
	{
		var x=document.getElementById(ids2[i][c]).innerHTML;
		if(x==num)
		{
			error=1;
			re=i;ce=c;
			return 0;
		}
	}
	for(i=0;i<9;i++)
	{
		var x=document.getElementById(ids2[r][i]).innerHTML;
		if(x==num)
		{
			error=1;
			re=r;ce=i;
			return 0;
		}
	}
	var startRow=r-r%3;
	var lastRow=startRow+3;
	var startColumn=c-c%3;
	var lastColumn=startColumn+3;
	for(i=startRow;i<lastRow;i++)
	{
		for(j=startColumn;j<lastColumn;j++)
		{
			var x=document.getElementById(ids2[i][j]).innerHTML;
			if(x==num)
			{
				error=1;
				re=i;ce=j;
				return 0;
			}
		}
	}
	return 1;
}
function isFinished()
{
	var i=0;var j=0;var flag=0;
	for(i=0;i<9;i++)
	{
		for(j=0;j<9;j++)
		{

			var x=document.getElementById(ids2[i][j]).innerHTML;
			if(x==" ")
			{
				flag=1;	
				break;
			}
		}
		if(flag==1)
			break;
	}
	if(flag==0)
	{
		complete=1;
		clearInterval(interval);
		alert("SuDoKu has been solved!!!!");
		$(".mask").fadeIn(1000);
		$(".form").fadeIn(1000);
	}
}
function change(value)
{
	//alert(value);
	if(complete==0)
	{
	removeError();
	if(value == 37)
	{
		$(ids[r][c]).css({"background-color":"#FFFFFF"});
		if(c==0)
		{
			c=8;
		}
		else
		{
			c--;
		}
		$(ids[r][c]).css({"background-color":"#FFFF00"});

	}
	else if(value==38)
	{
		$(ids[r][c]).css({"background-color":"#FFFFFF"});
		if(r==0)
		{
			r=8;
		}
		else
		{
			r--;
		}
		$(ids[r][c]).css({"background-color":"#FFFF00"});
	}	
	else if(value==39)
	{
		$(ids[r][c]).css({"background-color":"#FFFFFF"});
		if(c==8)
		{
			c=0;
		}
		else
		{
			c++;
		}
		$(ids[r][c]).css({"background-color":"#FFFF00"});
	}	
	else if(value==40)
	{
		$(ids[r][c]).css({"background-color":"#FFFFFF"});
		if(r==8)
		{
			r=0;
		}
		else
		{
			r++;
		}
		$(ids[r][c]).css({"background-color":"#FFFF00"});
	}
	else if(value==8 || value==46)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				document.getElementById(ids2[r][c]).innerHTML=" ";
			}
			});
	}
	else if(value==49 || value==97)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(1)==1)
				{
					document.getElementById(ids2[r][c]).innerHTML="1";
					isFinished();

				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="1";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==50 || value==98)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(2)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="2";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="2";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==51 || value==99)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(3)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="3";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="3";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==52 || value==100)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(4)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="4";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="4";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==53 || value==101)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(5)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="5";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="5";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==54 || value==102)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(6)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="6";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="6";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==55 || value==103)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(7)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="7";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="7";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==56 || value==104)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(8)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="8";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="8";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	else if(value==57 || value==105)
	{
		$(ids[r][c]).each(function(){
			if($(this).attr("class")=='a0')
			{
				if(isSafe(9)==1)
				{
				document.getElementById(ids2[r][c]).innerHTML="9";
					isFinished();
				}
				else
				{
					document.getElementById(ids2[r][c]).innerHTML="9";
					$(ids[r][c]).css({"background":"#FF5050"});
				}
			}
		});
	}
	}
}
$(document).keydown(function(e){
change(e.keyCode);
});
$(document).ready(function(){
		$("#timerCase").css({"top":(screen.height-200),"left":(screen.width-300)});
		alert("Start");
		$("#1").css({"background-color":"#FFFF00"});
		var i=0;
		for(i=0;i<9;i++)
		{			
		$(classes[i]).each(function(){
			document.getElementById(this.id).innerHTML=(i+1);
		});
		}
		$(".a0").each(function(){
			document.getElementById(this.id).innerHTML=" ";
			});
		interval=setInterval(function(){timeit()},1000);
		$(".sudokuSmall td").click(function(){
			if(complete==0)
			{
			removeError();
			$(ids[r][c]).css({"background-color":"#FFFFFF"});
			r=parseInt((this.id-1)/9);
			c=(this.id-1)%9;
			$(ids[r][c]).css({"background-color":"#FFFF00"});
			}

		});
		$("#submit").click(function(){
				
				var name1=$("#name").val();
				//alert(name1);
				$(".sudoku").each(function(){
					//alert(this.id);
					if(this.id=="b1")
					{
						//alert("easy");
						mode="easy";
						//alert(mode);
					}
					else if(this.id=="b2")
					{
						mode="medium";
					}
					else if(this.d=="b3")
					{
						 mode="hard";
					}
					});
				//alert(mode);
				str="test2.php?mode="+mode+"&name="+name1+"&minute="+minute+"&seconds="+seconds;
				location.href=str;
				});
				
});
</script>
<style type="text/css">
td
{
background-color:#FFFFFF;
}
td.0
{
 color:black;
}
.sudoku
{
margin: auto;
left: 0;
right:0;
position: absolute;
width:450px;
height: 450px;
border-collapse: collapse;
top:100px;
color:red;
}
.form
{
margin:auto;
left:0;
right:0;
position:absolute;
width:457px;
height:461px;
top:101px;
    z-index:1500;
    background-color:white;
}
.sudokuSmall
{
width:150px;
height:150px;
border-collapse: collapse;
overflow:hidden;
}
<?php 
echo "\n";
for($i=1;$i<=9;$i++)
{
	echo ".a".$i."\n{\nwidth:50px;\nheight:50px;\ntext-align:center;\ncolor:red;\nvertical-align:middle;\nfont-size:15px;\n}\n";
}
?>
.a0
{
width:50px;
height:50px;
       text-align:center;
color:black;
      vertical-align:middle;
      font-size:15px;
}
</style>
</head>
<body>
<div class="mask" style="z-index:1000;position:absolute;top:0px;left:0px;width:100%;height:100%;background-color:black;opacity:0.7;display:none;"></div>
<div class="form" style="display:none;vertical-align:middle;text-align:center;">
<div style="position:absolute;top:150px;left:0;right:0;margin:auto;">name:<input id="name" type="text"></div>
<div id="submit" style="background-color:#003366;color:white;font-size:18px;text-align:center;width:100px;position:absolute;top:300px;right:0px;left:0px;margin:auto;veritcal-align:middle;">Submit</div>
</div>
<table id="b<?php echo $_POST['mode']?>" class="sudoku">
<tr style="border:1px solid black;">
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="1" class="a<?php echo $sudoku[0][0]?>" style="border:solid #CCCCCC;border-left-width:0px;border-top-width:0px;border-right-width:1px;border-bottom-width:1px;"></td>
<td id="2" class="a<?php echo $sudoku[0][1]?>" style="border:solid #CCCCCC;border-top-width:0px;border-left-width:1px;border-bottom-width:1px;border-right-width:1px;"></td>
<td id="3" class="a<?php echo $sudoku[0][2]?>" style="border:solid #CCCCCC;border-top-width:0px;border-right-width:0px;border-bottom-width:1px;border-left-width:1px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="10" class="a<?php echo $sudoku[1][0]?>" style="border:solid #CCCCCC;border-left-width:0px;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;"></td>
<td id="11" class="a<?php echo $sudoku[1][1]?>" style="border:solid #CCCCCC;border-left-width:1px;border-top-width:1px;border-right-width:1px;border-bottom-width:1px;"></td>
<td id="12" class="a<?php echo $sudoku[1][2]?>" style="border:solid #CCCCCC;border-left-width:1px;border-top-width:1px;border-right-width:0px;border-bottom-width:1px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="19" class="a<?php echo $sudoku[2][0]?>" style="border:solid #CCCCCC;border-left-width:0px;border-top-width:1px;border-right-width:1px;border-bottom-width:0px;"></td>
<td id="20" class="a<?php echo $sudoku[2][1]?>" style="border:solid #CCCCCC;border-left-width:1px;border-top-width:1px;border-right-width:1px;border-bottom-width:0px;"></td>
<td id="21" class="a<?php echo $sudoku[2][2]?>" style="border:solid #CCCCCC;border-left-width:1px;border-top-width:1px;border-right-width:0px;border-bottom-width:0px;"></td>
</tr>
</table>
</td>
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="4" class="a<?php echo $sudoku[0][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="5" class="a<?php echo $sudoku[0][4]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="6" class="a<?php echo $sudoku[0][5]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="13" class="a<?php echo $sudoku[1][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="14" class="a<?php echo $sudoku[1][4]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="15" class="a<?php echo $sudoku[1][5]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="22" class="a<?php echo $sudoku[2][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="23" class="a<?php echo $sudoku[2][4]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="24" class="a<?php echo $sudoku[2][5]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr>
</table>
</td>
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="7" class="a<?php echo $sudoku[0][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="8" class="a<?php echo $sudoku[0][7]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="9" class="a<?php echo $sudoku[0][8]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="16" class="a<?php echo $sudoku[1][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="17" class="a<?php echo $sudoku[1][7]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="18" class="a<?php echo $sudoku[1][8]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="25" class="a<?php echo $sudoku[2][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="26" class="a<?php echo $sudoku[2][7]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="27" class="a<?php echo $sudoku[2][8]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr></table>
</td>
</tr>
<tr  style="border:1px solid black;">
<td  style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF">
<td id="28" class="a<?php echo $sudoku[3][0]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="29" class="a<?php echo $sudoku[3][1]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="30" class="a<?php echo $sudoku[3][2]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="37" class="a<?php echo $sudoku[4][0]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="38" class="a<?php echo $sudoku[4][1]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="39" class="a<?php echo $sudoku[4][2]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="46" class="a<?php echo $sudoku[5][0]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="47" class="a<?php echo $sudoku[5][1]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="48" class="a<?php echo $sudoku[5][2]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr>
</table>
</td>
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="31" class="a<?php echo $sudoku[3][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="32" class="a<?php echo $sudoku[3][4]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="33" class="a<?php echo $sudoku[3][5]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="40" class="a<?php echo $sudoku[4][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="41" class="a<?php echo $sudoku[4][4]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="42" class="a<?php echo $sudoku[4][5]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="49" class="a<?php echo $sudoku[5][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="50" class="a<?php echo $sudoku[5][4]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="51" class="a<?php echo $sudoku[5][5]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr>
</table>
</td>
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="34" class="a<?php echo $sudoku[3][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="35" class="a<?php echo $sudoku[3][7]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="36" class="a<?php echo $sudoku[3][8]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="43" class="a<?php echo $sudoku[4][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="44" class="a<?php echo $sudoku[4][7]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="45" class="a<?php echo $sudoku[4][8]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="52" class="a<?php echo $sudoku[5][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="53" class="a<?php echo $sudoku[5][7]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="54" class="a<?php echo $sudoku[5][8]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr>
</table>
</td>
</tr>
<tr style="border:1px solid black;">
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="55" class="a<?php echo $sudoku[6][0]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="56" class="a<?php echo $sudoku[6][1]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="57" class="a<?php echo $sudoku[6][2]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="64" class="a<?php echo $sudoku[7][0]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="65" class="a<?php echo $sudoku[7][1]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="66" class="a<?php echo $sudoku[7][2]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="73" class="a<?php echo $sudoku[8][0]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="74" class="a<?php echo $sudoku[8][1]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="75" class="a<?php echo $sudoku[8][2]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr>
</table>
</td>
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="58" class="a<?php echo $sudoku[6][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="59" class="a<?php echo $sudoku[6][4]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="60" class="a<?php echo $sudoku[6][5]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="67" class="a<?php echo $sudoku[7][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="68" class="a<?php echo $sudoku[7][4]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="69" class="a<?php echo $sudoku[7][5]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="76" class="a<?php echo $sudoku[8][3]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="77" class="a<?php echo $sudoku[8][4]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="78" class="a<?php echo $sudoku[8][5]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr>
</table>
</td>
<td style="border: 1px solid black;">
<table class="sudokuSmall">
<tr style="border:1px solid #0000FF;">
<td id="61" class="a<?php echo $sudoku[6][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-top-width:0px;"></td>
<td id="62" class="a<?php echo $sudoku[6][7]?>" style="border:  1px solid #CCCCCC; border-top-width:0px;"></td>
<td id="63" class="a<?php echo $sudoku[6][8]?>" style="border: 1px solid #CCCCCC;border-top-width:0px;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="70" class="a<?php echo $sudoku[7][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;"></td>
<td id="71" class="a<?php echo $sudoku[7][7]?>" style="border:  1px solid #CCCCCC;"></td>
<td id="72" class="a<?php echo $sudoku[7][8]?>" style="border: 1px solid #CCCCCC;border-right-width:0px;"></td>
</tr>
<tr style="border:1px solid #0000FF;">
<td id="79" class="a<?php echo $sudoku[8][6]?>" style="border: 1px solid #CCCCCC;border-left-width:0px;border-bottom-width:0px;"></td>
<td id="80" class="a<?php echo $sudoku[8][7]?>" style="border:  1px solid #CCCCCC; border-bottom-width:0px;"></td>
<td id="81" class="a<?php echo $sudoku[8][8]?>" style="border: 1px solid #CCCCCC;border-bottom-width:0px;border-right-width:0px;"></td>
</tr>
</table>
</td>
</tr>
</table>
<div id="timerCase" style="width:200px;height:100px;text-align:center;position:absolute;top:100px;height:100px;color:blue;"><h2 id="demo">00:00</h2></div>
</body>
</html>
