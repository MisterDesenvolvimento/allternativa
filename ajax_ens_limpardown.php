<?php 
/** remover a pasta e tudo centro dele */
function ApagaDir($dir) {
    if($objs = glob($dir."/*")){
        foreach($objs as $obj) {
                is_dir($obj)? ApagaDir($obj) : unlink($obj);
        }
    }
    rmdir($dir);
} 	
$nome_da_pasta="reciboPrestador";	
ApagaDir($nome_da_pasta); 	
mkdir($nome_da_pasta);

?>