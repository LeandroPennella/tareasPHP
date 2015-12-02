<?php
function sql_contarRegistros($mysqli, $sql)
{
	if ($result = mysqli_query($mysqli, $sql))
	{
		return mysqli_num_rows($result);
	}
	//mysqli_free_result($result);
	//$result->close(); 
}

function getDB()
{
    static $db;

    if (!$db) {
        $db =  new mysqli(SQL_HOST,SQL_US,SQL_PW,SQL_DB);	
    }

    return $db;
}

function SQLExecQuery($query)
{
    $db =  new mysqli(SQL_HOST,SQL_US,SQL_PW,SQL_DB);	
    return $db->query($sql);
}

?>