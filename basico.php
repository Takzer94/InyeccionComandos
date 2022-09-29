
<?php
if( isset( $_POST[ 'Submit' ]  ) ) {
    // Input
    $target = $_REQUEST[ 'ip' ];

    // Blacklist
    $substitutions = array(
        '&&' => '',
        ';'  => '',
    );

    $target = str_replace( array_keys( $substitutions ), $substitutions, $target );

    // Ejecutar Ping
    if( stristr( php_uname( 's' ), 'Windows NT' ) ) {
        // Windows
        $cmd = shell_exec( 'ping  ' . $target );
    }
    else {
        // *nix
        $cmd = shell_exec( 'ping  -c 4 ' . $target );
    }

    // Respuesta al Usuario final
    echo "<pre>{$cmd}</pre>";
}

?>
<html>
<body>
	<form action="" method="post">
	Ingrese una dirección IP: <input type="text" name="ip"><br>
	<input type="submit" name="Submit" value="Submit">
</form>

</body>
</html>
