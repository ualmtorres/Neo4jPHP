<?php
	include('connection.php');

    $query = "CREATE (johndoe: Person {name: 'John Doe', 
    					born: 1950}
    			)";
    $connection->sendCypherQuery($query);

    $query = "CREATE (ggvdmovie: Movie {title: 'GGVD', 
    					released: 2015, 
    					tagline: 'NoSQL databases for managing non-structured and large amount of data'}
    			)";
    $connection->sendCypherQuery($query);
?>
