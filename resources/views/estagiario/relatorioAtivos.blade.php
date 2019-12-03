<!DOCTYPE html>
<html>
<title>Relatório</title>
<head>
<style>
    .mesmaLinha {
        white-space: nowrap;
    }
    .linha{
        border-bottom:1px solid black;
    }
</style>
</head>

<body>
    <h1> Relatório de ativos </h1>
    <?php
        if(count($contratos) == 0){
            echo "<h4>Nenhum resultado encontrado...</h4>";
        }else{
            ?>
            <table>
                <thead>
                    <tr>
                        <th>ALUNO</th>
                        <th>EMPRESA</th>
                        <th>INÍCIO</th>
                        <th>FIM</th>
                        <th>TELEFONE</th>
                        <th>CURSO</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contratos as &$contrato)
            <tr>
                <td class="linha">{{$contrato->nome}}</td>
                @foreach ($empresas as &$empresa)
                <?php

                if ($empresa->id == $contrato->empresa) {
                    ?>
                    <td class="linha">{{$empresa->razao_social}}</td>
                <?php
                }
                ?>
                @endforeach
                <?php
                    if($contrato->inicial == 0){
                        echo "<td class=\"linha\"></td>";
                    }else{
                        $data = $contrato->inicial;
                        $ano = substr($data, 0, 4);
                        $mes = substr($data, 5, 2);
                        $dia = substr($data, 8, 2);

                        $inicio = $dia . "/" . $mes . "/" . $ano;

                        echo "<td class=\"linha mesmaLinha\">{$inicio}</td>";
                    }
                    
                    if($contrato->final == 0){
                        echo "<td class=\"linha\"></td>";
                    }else{
                        $data = $contrato->final;
                        $ano = substr($data, 0, 4);
                        $mes = substr($data, 5, 2);
                        $dia = substr($data, 8, 2);

                        $fim = $dia . "/" . $mes . "/" . $ano;

                        echo "<td class=\"linha mesmaLinha\">{$fim}</td>";
                    }
                    
                ?>
                <td class="linha">{{$contrato->telefone}}</td>
                @foreach ($coordenadores as &$curso)
                <?php

                if ($curso->id == $contrato->curso) {
                    ?>
                    <td class="linha">{{$curso->curso}}</td>
                <?php
                }
                ?>
                @endforeach
            </tr>
            @endforeach

                </tbody>
        </table>
            <?php
        }
    ?>
    
</body>
</html>