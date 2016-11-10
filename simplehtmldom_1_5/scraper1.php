<?php 
 include('simple_html_dom.php');
$season = array();
for($i = 2015; $i > 2008; $i--){
$html = file_get_html("http://games.espn.com/ffl/tools/finalstandings?leagueId=347987&seasonId=$i#");

 //Test getElementById 
$table = $html->getElementById('#finalRankingsTable');
$rowData= array();

/*var_dump($table);*/

foreach($table->find('tr') as $row ){
  
  $flight = array();
 
  foreach ($row->find('td') as $cell){
        
    foreach($cell->find('a') as $anchor){
      $url = $anchor->getAttribute('href');
      $pattern = '/^.*?teamId=(\d+).*$/';
      //league Id selector  
      /*'^.*?leagueId=(\d+).*$'*/
      preg_match_all($pattern, $url, $team_id);
      //put the team_id into the end flight array
      
    foreach($team_id as $id){
      $flight[]= $id;
    }
    
    }
    $flight[]= $cell->plaintext;
    //getting the teams id from the nth cell
    /*unset($flight[3]);*/
    /*$indexedFlight = array_values($flight);*/
  }
  //pushes each TR into the array 
  
 /* $rowData[]= $indexedFlight;
    unset($rowData[0], $rowData[1]);
  $indexRowData= array_values($rowData);*/
  $rowData[] = $flight;
}
/*$season[$i] = $indexRowData;*/
  $season[$i]= $rowData;
    
}
var_dump($season);
?>