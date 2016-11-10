<?php 
 include('simple_html_dom.php');

$season = array();
for($i = 2015; $i > 2008; $i-- ){
   
$html = file_get_html("http://games.espn.com/ffl/tools/finalstandings?leagueId=347987&seasonId=$i#");
 //Test getElementById 
$table = $html->getElementById('#finalRankingsTable');
  
$rowData= array();
 
 
foreach($table->find('tr') as $row ){
   
  $rows = array();
   
  foreach ($row->find('td') as $cell){
    $rows[]= $cell->plaintext;
		unset($rows[3]);
		
		$indexRows = array_values($rows);
  }
  $rowData[]= $indexRows;
}
    unset($rowData[0], $rowData[1]);
	
    $indexData = array_values($rowData);
foreach($season as $year){
  $season[$year] = $indexData;
}	
  
  var_dump($season);
        
 }

?>