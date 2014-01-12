<?php
function check($sudoku,$row,$column,$num)
{
	for ($i=0; $i <9 ; $i++) 
	{
		if(($sudoku[$i][$column]==$num) && ($i!=$row))
		{
			return False;
		} 
	}
	for ($j=0; $j <9 ; $j++) 
	{
		if (($sudoku[$row][$j]==$num) && ($j!=$column))
		{
			return False;
		} 
	}
	$startRow=$row-$row%3;
	$lastRow=$row-$row%3+3;
	$startColumn=$column-$column%3;
	$lastColumn=$column-$column%3+3;
	for ($i=$startRow; $i<$lastRow  ; $i++) { 
		for ($j=$startColumn; $j <$lastColumn ; $j++) {
			if($sudoku[$i][$j]==$num && $i!=$row && $j!=$column)
			{
				return False;
			}
		}
	}
	return True;
}
function solve(&$sudoku,$row,$column,$mark)
{
	if($mark[$row][$column]==0)
	{
		for (++$sudoku[$row][$column];$sudoku[$row][$column]<=9;$sudoku[$row][$column]++)
		{
			if(check($sudoku,$row,$column,$sudoku[$row][$column]))
			{
				if($row==8 && $column==8)
				{
					return True;
				}
				elseif ($column==8)
				{
					if(solve($sudoku,$row+1,0,$mark))
					{
						return True;
					}
				}
				else
				{
					if(solve($sudoku,$row,$column+1,$mark))
					{
						return True;
					}
				}
			}
		}
		$sudoku[$row][$column]=0;
	}
	else
	{
		if($row==8 && $column==8)
		{
			return True;
		}
		elseif($column==8)
		{
			if (solve($sudoku,$row+1,0,$mark))
			{
				return True;
			}
		}
		else 
		{
			if(solve($sudoku,$row,$column+1,$mark))
				return True;
		}

	}
}

function printIt($sudoku)
{
	for ($i=0;$i<9;$i++)
	{
		if($i%3==0)
		{
			echo " -------------------------------<br>";
		}
		for ($j=0;$j<9;$j++)
		{
			if($j%3==0)
				echo " | ";
			echo " ".$sudoku[$i][$j]." ";
		}
		echo " | <br>";
	}
	echo "----------------------------<br>";
}

$mark=array(array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0) );
$sudoku=array(array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0),array(0,0,0,0,0,0,0,0,0) );
$sudoku[0][0]=rand()%9+1;
$mark[0][0]=1;
for ($i=0; $i <7 ; $i++)
{
	$r=rand()%9;
	$c=rand()%9;
	$num=rand()%9+1;
	while(!(check($sudoku,$r,$c,$num))) 
	{
		$num=rand()%9+1;		
	}
	$sudoku[$r][$c]=$num;
	$mark[$r][$c]=1;
}
//printIt($sudoku);
//printIt($mark);
solve($sudoku,0,0,$mark);
//printIt($sudoku);
for($i=0;$i<9;$i++)
{
	for($j=0;$j<9;$j++)
	{
		$mark[$i][$j]=1;
	}
}
$mode=$_POST["mode"];
if($mode==1)
	$x=4;
elseif($mode==2)
 	$x=5;
if($mode == 1 || $mode == 2)
{
for ($i=0;$i<9;$i++)
{
	$j=0;
	while($j<$x)
	{
		$num=rand()%9;
		if($mark[$i][$num]==1)
		{
			$mark[$i][$num]=0;
			$sudoku[$i][$num]=0;
			$j++;
		}
	}
}
}
else
{
for ($i=0;$i<9;$i++)
{
	$j=0;
	while($j<(rand()%2+5))
	{
		$num=rand()%9;
		if($mark[$i][$num]==1)
		{
			$mark[$i][$num]=0;
			$sudoku[$i][$num]=0;
			$j++;
		}
	}
}

}
//printIt($sudoku);
?>
