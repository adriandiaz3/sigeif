<?php 

	foreach ($documentos as $key => $documento) {
		$nomeArquivo = $documento->nome_documento;
		$dados = $documento->dados_documento;
	}

	$file = fopen($nomeArquivo,"a+");
	$bin = "";
	$i = 0;
    do {
	   	$bin .= chr(hexdec($dados{$i}.$dados{($i + 1)}));
	   	$i += 2;
    } while ($i < strlen($dados));
	fwrite($file,$bin);
	fclose($file);
	//Forçando o download...
	header("Content-type: application/pdf");
	header("Content-Disposition: attachment; filename=" . $nomeArquivo);
	//header("Content-Length: " . $doc->get('tamanho_documento'));
	header("Content-Transfer-Encoding: binary");
	readfile($nomeArquivo);

	//Apagando o arquivo
	unlink($nomeArquivo);
?>