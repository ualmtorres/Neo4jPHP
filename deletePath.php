<?php
	include('connection.php');

    $query = "MATCH path =(p: Person)-[:ACTED_IN]->(m:Movie)
		WHERE p.name = {theName} AND m.title = {theTitle} 
		DELETE path";
    $params = ['theName' => 'John Doe', 'theTitle' => 'GGVD'];
    $result = $connection->sendCypherQuery($query, $params);
?>
