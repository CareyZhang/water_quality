<link href="css/css.css" rel="stylesheet" type="text/css">
<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/js.js"></script>
<?
	include"sql/sql.php";
if($_GET[q]==1)
{
?>
<table id="dt_tb" border="1">
    <tr class="dt_tb_hd" align="center">
        <td class="dt_tb_ph">PH</td>
        <td class="dt_tb_tur">Turbidity</td>
        <td class="dt_tb_time">Upload Time</td>
	</tr>
    <?
    	$detail_arr=$mq("SELECT * FROM quality");
		while($tmp=$mfa($detail_arr))
		{
			?>
            <tr align="center">
                <td class="dt_tb_ph"><?=$tmp['_ph']?></td>
                <td class="dt_tb_tur"><?=$tmp['_turbidity']?></td>
                <td class="dt_tb_time"><?=$tmp['_time']?></td>
            </tr>
            <?
		}
		if($mnr($detail_arr)==0)
		{
			?>
            <tr align="center">
                <td class="dt_tb_ph" colspan="3">No data</td>
            </tr>
            <?
		}
	?>
</table>
<?
}
else if($_GET[q]==2)
{
    $detail_arr=$mq("SELECT * FROM quality");
	$ph_min=14;
	$ph_max=0;
	$ph_tot=0;
	$tur_min=5;
	$tur_max=0;
	$tur_tot=0;
	while($tmp=$mfa($detail_arr))
	{
		if($tmp[_ph]<$ph_min)
		{
			$ph_min=$tmp[_ph];
		}
		if($tmp[_ph]>$ph_max)
		{
			$ph_max=$tmp[_ph];
		}
		$ph_tot+=$tmp[_ph];
		if($tmp[_turbidity]<$tur_min)
		{
			$tur_min=$tmp[_turbidity];
		}
		if($tmp[_turbidity]>$tur_max)
		{
			$tur_max=$tmp[_turbidity];
		}
		$tur_tot+=$tmp[_turbidity];
	}
	?>
    <table id="ay_tb" border="1">
    	<?
        if($mnr($detail_arr)!=0)
		{
			?>
                <tr class="ay_tb_hd" align="center">
                    <td colspan="3">PH</td>
                </tr>
                <tr align="center" height="40">
                    <td>MAX</td>
                    <td>MIN</td>
                    <td>AVER</td>
                </tr>
                <tr align="center" height="40">
                    <td><?=$ph_max?></td>
                    <td><?=$ph_min?></td>
                    <td><?=$ph_tot/$mnr($detail_arr)?></td>
                </tr>
                <tr class="ay_tb_hd" align="center">
                    <td colspan="3">Turbidity</td>
                </tr>
                <tr align="center" height="40">
                    <td>MAX</td>
                    <td>MIN</td>
                    <td>AVER</td>
                </tr>
                <tr align="center" height="40">
                    <td><?=$tur_max?></td>
                    <td><?=$tur_min?></td>
                    <td><?=$tur_tot/$mnr($detail_arr)?></td>
                </tr>
            <?
		}
		?>
    	<tr>
        	<td colspan="3" align="right">共<?=$mnr($detail_arr)?>筆資料</td>
        </tr>
    </table>
    <?
}
?>