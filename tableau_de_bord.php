<!DOCTYPE html>
<html lang="fr">
	<head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="tableau_de_bord.css" />
        <title>tableau de bord</title>
	</head>  
	
	<body>
		<h1>Menu principal</h1>
		<div id="menu">
			<form action="temperature.html"><input type="submit" value="Température"></form>
			<form action="lumiere.html"><input type="submit" value="Lumière"></form>
			<form action="tableau_de_bord.php"><input type="submit" value="Tableau de bord"></form>
		</div>
	
		<fieldset>
		<legend>Tableau de bord</legend>
		<section>
		<table id="tab_temp">
				<tr><td colspan="3" class="en_tete">TEMPERATURE</td></tr>
				<tr class="corp">
					<td>Capteur 1 (temp1) : </td>
					<td class="value"><?php echo file_get_contents('/var/www/etu301/temp1.txt'); ?></td>
					<td rowspan="3"><img alt="termomètre gif" src="images/temp_gif.gif"/></td>
				</tr>
				<tr class="corp">
					<td>Capteur 2 (temp2) : </td>
					<td class="value"><?php echo file_get_contents('/var/www/etu301/temp2.txt'); ?></td>
				</tr>
				<tr class="corp">
					<td>Capteur 3 (temp3) : </td>
					<td class="value"><?php echo file_get_contents('/var/www/etu301/temp3.txt'); ?></td>
				</tr>
				<tr><td colspan="3" class="footer"><img alt="termomètre" src="images/capteur_temp.png"/></td></tr>
		</table>
		
		
		<table id="tab_lum">
				<tr><td colspan="3" class="en_tete">LUMIERE</td></tr>
				<tr class="corp">
					<td>Capteur 1 (lum1) : </td>
					<td class="value"><div class="gris"><div class="rouge" style="width : <?php echo file_get_contents('/var/www/etu301/lum1.txt'); ?>%"><?php echo file_get_contents('/var/www/etu301/lum1.txt'); ?> %</div></div></td>
					<td rowspan="3"><img alt="lumière gif" src="images/lum_gif.gif"/></td>
				</tr>
				<tr class="corp">
					<td>Capteur 2 (lum2) : </td>
					<td class="value"><div class="gris"><div class="rouge" style="width : <?php echo file_get_contents('/var/www/etu301/lum2.txt'); ?>%"><?php echo file_get_contents('/var/www/etu301/lum2.txt'); ?> %</div></div></td>
				</tr>
				<tr class="corp">
					<td>Capteur 3 (lum3) : </td>
					<td class="value"><div class="gris"><div class="rouge" style="width : <?php echo file_get_contents('/var/www/etu301/lum3.txt'); ?>%"><?php echo file_get_contents('/var/www/etu301/lum3.txt'); ?> %</div></div></td>
				</tr>
				<tr><td colspan="3" class="footer"><img alt="capteur lumière" src="images/capteur_lum.png"/></td></tr>
		</table>
		</section>
		<a href="https://yncrea.fr/">© Yncréa Ouest (29200)</a>
		</fieldset>
		<a href="https://www.isen.fr/"><img alt="Logo ISEN" src="images/logo_isen.jpg"/></a>
	</body>
</html>

	
	