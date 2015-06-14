<?php
	include('connection.php');

    $query = "MATCH (johndoe: Person {name: 'John Doe'}), (ggvdmovie: Movie {title: 'GGVD'}) CREATE (johndoe)-[:ACTED_IN {roles: ['Johnnie']}]->(ggvdmovie)";
    $result = $connection->sendCypherQuery($query);

?>
