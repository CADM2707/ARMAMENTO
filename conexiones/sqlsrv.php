
<?php

    function connection_object()
    {
        $serverName = '10.13.211.240'; //IP DEL SERVIDOR
        $connectionOptions = array(
            'Database' => 'SECTOR',
            'Uid' => 'opArmamento',
            'PWD' => '4rm4m3nt0'
        );
        $conn = sqlsrv_connect($serverName, $connectionOptions);

        if($conn){
            return $conn;
        }else{
            die(format_errors(sqlsrv_errors()));
        }
    }
        

    function format_errors( $errors )
    {
        echo "Error information: ";

        foreach ( $errors as $error )
        {
            echo "SQLSTATE: ".$error['SQLSTATE']."\n";
            echo "Code: ".$error['code']."\n";
            echo "Message: ".$error['message']."\n";
        }
    }
