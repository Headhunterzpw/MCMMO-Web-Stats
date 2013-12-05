<?php

/* mysqli settings (->mysqli<- not mysql */
$settings['db_host'] = 'localhost';
$settings['db_port'] = '3306';
$settings['db_username'] = '';
$settings['db_password'] = '';
$settings['db_database'] = '';

$settings['use_html'] = 'true'; /* use html, set to true if standalone or false if embedded */
$settings['page_title'] = 'mcMMO - WebStats'; /* set page title if running this in standalone mode */
$settings['use_jquery'] = 'true'; /* use jquery from webstats */
$settings['use_datatables'] = 'true'; /* use datatables plugin? */
$settings['use_datatables_css'] = 'true'; /* use datatables css? */
$settings['use_themeroller'] = 'true'; /* use themeroller for datatables */
$settings['use_custom'] = 'false'; /* use custom css, rename your css to custom.css and place it inside the css directory */
$settings['use_bootstrap'] = 'false'; /* use bootstrap classes, don't support bootstrap as standalone only if embedded in bootstrap enviroment */
$settings['use_bootstrap_css'] = 'true'; /* use included bootstrap css */
$settings['wrapper_size'] = ''; /* set size in pixels or leave blank for 100% */
$settings['datatables_lang'] = ''; /* datatables language, look in js/lang for code.. eg. en_US.js, empty uses default language */

/* language not controlled by datatables */
$lang['player'] = "Player";
$lang['taming'] = "Taming";
$lang['mining'] = "Mining";
$lang['woodcutting'] = "Woodcutting";
$lang['repair'] = "Repair";
$lang['unarmed'] = "Unarmed";
$lang['herbalism'] = "Herbalism";
$lang['excavation'] = "Excavation";
$lang['archery'] = "Archery";
$lang['swords'] = "Swords";
$lang['axes'] = "Axes";
$lang['acrobatics'] = "Acrobatics";
$lang['fishing'] = "Fishing";

/***************************************************************************************************************************/
/***************************************************************************************************************************/
/***************************************************DO	NOT		EDIT	BELOW***********************************************/
/***************************************************************************************************************************/
/***************************************************************************************************************************/

$mysqli = new mysqli($settings['db_host'], $settings['db_username'], $settings['db_password'], $settings['db_database']);

if (mysqli_connect_errno()) {
	printf("Connection failed: %s\n", mysqli_connect_error());
	exit();
}

if($settings['use_html'] == 'true') {
	echo '<!DOCTYPE HTML>';
	echo '<head>';
	
	echo '<title>'.$settings['page_title'].'</title>';
	
}

if($settings['use_jquery'] == 'true') {
	echo '<script src="js/jquery-1.10.2.min.js" type="text/javascript"></script>';
}

if($settings['use_datatables'] == 'true') {
	echo '<script src="js/jquery.dataTables.min.js" type="text/javascript"></script>';
}

if($settings['use_datatables_css'] == 'true') {
	echo '<link rel="stylesheet" href="css/jquery.dataTables.css">';
}

if($settings['use_themeroller'] == 'true') {
	echo '<script src="js/jquery-ui-1.10.3.custom.min.js" type="text/javascript"></script>';
	echo '<link rel="stylesheet" href="css/smoothness/jquery-ui-1.10.3.custom.min.css">';
}

if($settings['use_bootstrap_css'] == 'true') {
	echo '<link rel="stylesheet" href="css/bootstrap.min.css">';
}

if($settings['use_custom'] == 'true') {
	echo '<link rel="stylesheet" href="css/custom.css">';
}

if($settings['use_html'] == 'true') {
	echo '</head>';
	echo '<body>';
}

if(empty($settings['wrapper_size'])) {
	echo '<div style="width:100%;">';
} else {
	echo '<div style="width:'.$settings['wrapper_size'].'px;">';
}

if($settings['use_bootstrap'] == 'true') {
	echo '<div class="row">';
	echo '<div class="col-xs-12">';
	echo '<div class="table-responsive">';
}

if($settings['use_bootstrap'] == 'true') {
	echo '<table id="table_mcmmo" class="table table-striped table-bordered table-hover">';
} else {
	echo '<table id="table_mcmmo">';
}

echo '<thead>';

echo '<tr>';

echo '<th>'.$lang['player'].'</th>';
echo '<th>'.$lang['taming'].'</th>';
echo '<th>'.$lang['mining'].'</th>';
echo '<th>'.$lang['woodcutting'].'</th>';
echo '<th>'.$lang['repair'].'</th>';
echo '<th>'.$lang['unarmed'].'</th>';
echo '<th>'.$lang['herbalism'].'</th>';
echo '<th>'.$lang['excavation'].'</th>';
echo '<th>'.$lang['archery'].'</th>';
echo '<th>'.$lang['swords'].'</th>';
echo '<th>'.$lang['axes'].'</th>';
echo '<th>'.$lang['acrobatics'].'</th>';
echo '<th>'.$lang['fishing'].'</th>';

echo '</tr>';

echo '</thead>';

echo '<tbody>';

$query = "SELECT mcmmo_users.user, mcmmo_skills.taming, mcmmo_skills.mining, mcmmo_skills.woodcutting, mcmmo_skills.repair, mcmmo_skills.unarmed, mcmmo_skills.herbalism, mcmmo_skills.excavation, mcmmo_skills.archery, mcmmo_skills.swords, mcmmo_skills.axes, mcmmo_skills.acrobatics, mcmmo_skills.fishing FROM mcmmo_users INNER JOIN mcmmo_skills ON mcmmo_users.id=mcmmo_skills.user_id";

if ($stmt = $mysqli->prepare($query)) {
								
	/* execute statement */
	$stmt->execute();

	/* bind result variables */
	$stmt->bind_result($user, $taming, $mining, $woodcutting, $repair, $unarmed, $herbalism, $excavation, $archery, $swords, $axes, $acrobatics, $fishing);

	/* fetch values */
	while ($stmt->fetch()) {
		echo '<tr>';
			echo '<td>'.$user.'</td>';
			echo '<td>'.$taming.'</td>';
			echo '<td>'.$mining.'</td>';
			echo '<td>'.$woodcutting.'</td>';
			echo '<td>'.$repair.'</td>';
			echo '<td>'.$unarmed.'</td>';
			echo '<td>'.$herbalism.'</td>';
			echo '<td>'.$excavation.'</td>';
			echo '<td>'.$archery.'</td>';
			echo '<td>'.$swords.'</td>';
			echo '<td>'.$axes.'</td>';
			echo '<td>'.$acrobatics.'</td>';
			echo '<td>'.$fishing.'</td>';
		echo '</tr>';
	}
	
	/* close statement */
	$stmt->close();
	
}

/* close connection */
$mysqli->close();

echo '</tbody>';

echo '</table>';

if($settings['use_bootstrap'] == 'true') {
	echo '</div>';
	echo '</div>';
	echo '</div>';
}

echo '</div>';

if($settings['use_datatables'] == 'true') {
	echo "<script>
	$().ready(function(){
		$(function() {
			var oTable = $('#table_mcmmo').dataTable( { \"aoColumns\": [null, null, null, null, null, null, null, null, null, null, null, null, null], \"bJQueryUI\": true,
			\"sPaginationType\": \"full_numbers\"	} );
		});
	});
	</script>";
}

if(!empty($settings['datatables_lang'])) {
	echo '<script src="'.$settings['datatables_lang'].'" type="text/javascript"></script>';
}

if($settings['use_html'] == 'true') {
	echo '</body>';
	echo '</html>';
}

?>