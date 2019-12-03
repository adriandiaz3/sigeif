<!DOCTYPE html>
<html>
<title>Folha de presença</title>
<head>
</head>
<style type="text/css">
    .center {text-align: center;}
    .tabela {
        table-layout: auto;
        width: 100%;}
    .data {
        width: 20%;
    }
    
    .assinatura {
        width: 50%;
    }

    .coluna1{
        width: 60%;
    }

    .mesmaLinha{
        display: inline-block;
    }

    .tabela1, .data, .assinatura, .celula{
        border: 1px solid black;
        border-collapse: collapse;
    }

    .tabela1 td{
        font-size: 15px;
    }

    .direita {
        text-align: right;
    }

    .dados h4, p{
        line-height: 20%;
    }

    .observacao p {
        font-size: 11px;
        line-height: 20%;
    }
</style>
<body>
    <h4>Programa Jovem Aprendiz</h4>
    <div class="dados">
        <h4 class="center">Folha de Presença</h4>
        <?php
        use Carbon\Carbon;
        setlocale(LC_TIME, 'ptb');
        $dt = Carbon::now();
        $mes = strtoupper($dt->formatLocalized('%B'));
        ?>
        
        <p>Mês de Referência: 2019 {{$mes}}</p> 
        @foreach($estagiarios as $estagiario)
            @if($contrato->estagiario == $estagiario->id)<p>Aluno(a):  {{$estagiario->nome}}</p>@endif
        @endforeach
        @foreach($empresas as $empresa)
            @if($contrato->empresa == $empresa->id)
            <p>Empresa:  {{$empresa->razao_social}}</p>
            @endif
        @endforeach
    </div>
    <table class="tabela1 tabela">
        <thead>
            <tr class="center">
                <th class="data" colspan="2">DATA</th>
                <th class="assinatura">ASSINATURA DO ALUNO</th>
                <th></th>
            </tr>
        </thead>
        <tbody class="center">
            <?php 
                $start = Carbon::parse($dt)->startOfMonth();
                $end = Carbon::parse($dt)->endOfMonth();
                 $weekMap = [
                        0 => 'DOM',
                        1 => 'SEG',
                        2 => 'TER',
                        3 => 'QUA',
                        4 => 'QUI',
                        5 => 'SEX',
                        6 => 'SAB',
                    ];

                while ($start->lte($end)) {
                    echo "<tr>";
                    echo "<td class=\"celula\">{$start->format('d/m')}</td>";
                    echo "<td class=\"celula\">{$weekMap[$start->dayOfWeek]}</td>";
                    echo "<td class=\"celula\"></td>";
                    echo "<td></td>";
                    echo "</tr>";
                    $start->addDay();
                }
            ?>
        </tbody>
    </table>
    <div class="observacao">
        <p>Observações:</p>
        <p>* O aluno deverá assinar a folha de presença no dia respectivo ao dia em que está comparecendo às aulas.</p>    
        <p>* A assinatura da folha de presença deverá ser realizada no horário do intervalo</p> 
        <p>* Caso o aluno falte ou esqueça de preencher será considerado "Falta" no dia correspondente</p> 
        <p>* Falta por motivo de consulta médica, deverá ser apresentado Atestado.</p> 
        <p>* Demais casos serão tratados na Seção de Estágios.</p> 
    </div>
    <table class="tabela">
        <tbody>
            <tr>
                <td class="coluna1">Atenciosamente,</td>
                <td class="center">Conferido em ___/___/____</td>
            </tr>
            <tr>
                <td class="coluna1">
                    <b>
                        @foreach($chefe as $chefe)
                            {{$chefe->nome}}
                        @endforeach
                    <b>
                </td>
                <td>_____________________________________</td>
            </tr>
            <tr>
                <td class="coluna1">Chefe de Seção de Estágios e Relações Comunitárias.</td>
                <td class="center">Assinatura Chefe da SERC</td>
            </tr>
        </tbody>
    </table>
    </body>
</html>