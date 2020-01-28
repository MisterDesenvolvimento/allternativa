<?php
/**
 * User: Nicolas
 * Date: 05/10/2018
 * Time: 00:06
 */

require_once("fpdf/fpdf.php");
include_once("conexao.php");
require_once("valor_extenso.php");

include "ajax_ens_limpardown.php";


setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


error_reporting(E_ERROR | E_WARNING | E_PARSE);

//recendo variaveis
    $idPrestador = $_POST["idPrestador"];
    $idPagamento = $_POST["idPagamento"];
    $idCliente = $_POST["idCliente"];



//inicia selects e armazenamento variaveis
    $resultado = $pdo->prepare("SELECT servico, valor, id_ficha_apropriacao, data_realizacao_servico, data_pagamento_realizado, cachet, inss, irrf, agenciamento, desconto, data_geracao_recibo
            FROM pagamentos WHERE id = '$idPagamento' ");

    $resultado->execute();
    $result = $resultado->fetch(PDO::FETCH_ASSOC);

    $idSevico = $result['servico'];
    $idValor = $result['valor'];
    $idFicha = $result['id_ficha_apropriacao'];
    $dataRealizaServ = $result['data_realizacao_servico'];
    $dataPgRealiza = $result['data_pagamento_realizado'];
    $dataRecibo = $result['data_geracao_recibo'];
    $cachet = $result['cachet'];
    $inss = $result['inss'];
    $irrf = $result['irrf'];
    $agenciamento = $result['agenciamento'];
    $desconto = $result['desconto'];



    $resultado2 = $pdo->prepare("SELECT nome, documento
            FROM prestadores_servicos WHERE id = '$idPrestador' ");
    $resultado2->execute();
    $result2 = $resultado2->fetch(PDO::FETCH_ASSOC);
    $idNome = $result2['nome'];
    $idDoc = $result2['documento'];

    $resultado3 = $pdo->prepare("SELECT id, titulo
            FROM ficha_apropriacao WHERE id = '$idFicha' ");
    $resultado3->execute();
    $result3 = $resultado3->fetch(PDO::FETCH_ASSOC);
    $titulo = $result3['titulo'];


//prepara formato data
    $now = new DateTime();
    $datetime = $now->format('Y-m-d H:i:s');

//inicio montagem PDF
    $pdf= new FPDF("P","pt","A4");
    $pdf->AddPage();

    $pdf->SetFont('arial','B',12);
    $pdf->SetMargins(0,0,0,0);
    // Logo

    $pdf->Image('imagens/logo_allternativa.jpg',65,50,40);
    // Arial bold 15
    $pdf->Ln(25);

//cabecalho
    $pdf->Cell(590,20,utf8_decode("NOTA CONTRATUAL  PARA "),0,0,'C');
    $pdf->Ln(15);
    $pdf->Cell(590,20,utf8_decode("PRESTAÇÃO DE SERVIÇO CARACTERICAMENTE EVENTUAL"),0,0,'C');
    $pdf->Ln(15);
    $pdf->SetFont('arial','',12);
    $pdf->Cell(590,20,utf8_decode("(Portaria n.º 3347, de 30/09/1986)."),0,0,'C');
    $pdf->SetFont('arial','',10);
    $pdf->Ln(30);

 //corpo contrato
    $pdf->SetX("75");
    $pdf->MultiCell(450, 12, utf8_decode("A empresa Allternativa Filmes LTDA, com sede na Rua Alice, 224 - Laranjeiras, na cidade do Rio de Janeiro, CEP: 22241-020, inscrita no CNPJ sob o nº. CNPJ: 07.579.828/0001-95 Insc. Municipal: 376.637-3. Contrata os serviços de "."$idNome"."  "."$idDoc"),0,'J', false);
    $pdf->Ln(10);
    $pdf->SetX("75");
    $pdf->MultiCell(450, 12, utf8_decode("PRIMEIRA - O contratado se obriga a prestar seus serviços de "."$idSevico"." no dia ". strftime(' %d de %B de %Y', strtotime($dataRealizaServ)). " para o ". "$titulo" ."."),0,'J', false);

    $pdf->Ln(10);
    $pdf->SetX("75");
    $pdf->MultiCell(450, 12, utf8_decode("SEGUNDA - O Contratado desempenhará suas funções das 09h às 19h horas tendo por local de trabalho a cidade do Rio de Janeiro/RJ."),0,'J', false);
    $pdf->Ln(10);
    $pdf->SetX("75");
    $pdf->MultiCell(450, 12, utf8_decode("TERCEIRA - O Contratante se obriga a pagar ao contratado, quando para o desempenho dos seus serviços for necessário viajar, as despesas de transporte e alimentação e hospedagem, até o respectivo retorno."),0,'J', false);
    $pdf->Ln(10);
    $pdf->SetX("75");
    $pdf->MultiCell(450, 12, utf8_decode("Esta Nota Contratual, firmada para produção do "."$titulo"." vai assinada pelas partes contratantes para todos os efeitos da legalização do trabalho em vigor."),0,'J', false);
    $pdf->Ln(20);
    $pdf->Cell(590,12,"Rio de Janeiro,  ". strftime(' %d de %B de %Y', strtotime($dataRecibo)),0,0,'C');
    $pdf->Ln(40);
    $pdf->Cell(590,12,utf8_decode("_______________________________________"),0,0,'C');
    $pdf->Ln(20);
    $pdf->SetX("98");
    $pdf->Cell(400,12,utf8_decode("Allternativa Filmes X Ltda."),0,0,'C');
    $pdf->Ln(20);
    $pdf->SetX("75");
    $pdf->Cell(450,12,utf8_decode("========================================================================"),0,0,'C');
    $pdf->Ln(30);

 //inicio recibo quitacao
    $pdf->SetX("99");
    $pdf->SetFont('arial','B',12);
    $pdf->Cell(400,15,utf8_decode("RECIBO DE QUITAÇÃO"),0,0,'C');
    $pdf->Ln(30);
    $pdf->SetFont('arial','',10);
    $pdf->SetX("196");
    $pdf->Cell(100,15,utf8_decode("Cachet"),1,0,'C');
    $pdf->Cell(100,15,utf8_decode("R$ ".number_format($idValor, 2, ',', '.')),1,0,'C');
    $pdf->Ln();
    $pdf->SetX("196");
    $pdf->Cell(100,15,utf8_decode("INSS 11%"),1,0,'C');
    $pdf->Cell(100,15,utf8_decode("R$ ".number_format($inss, 2, ',', '.')),1,0,'C');
    $pdf->Ln();
    $pdf->SetX("196");
    $pdf->Cell(100,15,utf8_decode("IRRF"),1,0,'C');
    $pdf->Cell(100,15,utf8_decode("R$ ".number_format($irrf, 2, ',', '.')),1,0,'C');
    $pdf->Ln();
    $pdf->SetX("196");
    $pdf->Cell(100,15,utf8_decode("Agenciamento"),1,0,'C');
    $pdf->Cell(100,15,utf8_decode("R$ ".number_format($agenciamento, 2, ',', '.')),1,0,'C');
    $pdf->Ln();
    $pdf->SetX("196");
    $pdf->Cell(100,15,utf8_decode("Desconto"),1,0,'C');
    $pdf->Cell(100,15,utf8_decode("R$ ".number_format($desconto, 2, ',', '.')),1,0,'C');
    $pdf->Ln();
    $pdf->SetX("196");
    $pdf->Cell(100,15,utf8_decode("Liquido a Receber"),1,0,'C');
    $pdf->Cell(100,15,utf8_decode("R$ ".number_format($idValor, 2, ',', '.')),1,0,'C');
    $pdf->SetFont('arial','',10);

    $pdf->Ln(30);
    $pdf->SetX("70");
    $pdf->MultiCell(450, 12, utf8_decode("Recebi a importância de R$ ".number_format($idValor, 2, ',', '.')." (".escreverValorMoeda($idValor)."), pelos serviços prestados em decorrência da presente Nota Contratual, pelo qual dou plena e geral quitação."),0,'J', false);
    $pdf->Ln(20);




    $pdf->Cell(590,12,"Rio de Janeiro,  ".strftime(' %d de %B de %Y', strtotime($dataPgRealiza)),0,0,'C');
    $pdf->Ln(50);
    $pdf->Cell(590,12,utf8_decode("_______________________________________"),0,0,'C');
    $pdf->Ln(15);
    $pdf->Cell(590,12,utf8_decode("Prestador de serviço"),0,0,'C');
    $pdf->Ln(50);
    $pdf->SetX("98");
    $pdf->SetFont('arial','',8);
    $pdf->MultiCell(400, 12, utf8_decode("Rua Alice, 224 - Laranjeiras - Rio de Janeiro - RJ - CEP. 22241-020
    Tel. Fax: (21) 2542 5844
    CNPJ: 07.579.828/0001-95 Insc. Municipal: 376.637-3
    www.allternativafilmesx.com.br"),0,'C', false);


    $nomePdf = "ReciboPrestador"."$idNome".".pdf";
    $target_path = "reciboPrestador/".$nomePdf;
    $pdf->Output($target_path,"F");
    echo $target_path;
    exit();

?>

