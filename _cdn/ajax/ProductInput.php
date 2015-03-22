<?php

require('../../_app/Config.inc.php');



//RECIPITORES DO DADOS VIA AJAX
//
//
$Ar['id_prod'] = $_POST['acao'];
$Ar['mes'] = date('Y-m-d');
//Possivel mente pode ser alterando para qnt de venda
$Ar['qnt_vendas'] = "1";

////
///         CRIEI UMA LÓGICA AQUI SÓ PRA MELHORA O BANCO DE DADOS 
//          DEIXA BANCO SIMPLES.. E BEM ORGANIZADO PARA PODE GERAR
//          NOVO RECURSO SOBRE O RELATORIO FÁCILMENTE.
//          ASSIM FICA COMO UM INSERT DE DADOS MENSAL.. 
///

 ///Logica aqui foi, simular compra de produto rapida,
///usando alguma meotod privado para pode auxiliar-me nessa questão.. 
/// CHECK-INTCHECK--> ELE VERIFICA SE PRODUTO COMPRADO NO MES ATUAL JÁ ESTÁ 
/// COM REGISTRO DE VENDA NESTE MES ATUAL.. ENTÃO SE TIVE ELE RECUPERA
///O DADOS PELO OUTRO METODO PRIVADO QUE EU CRIEI O CHECK-INCREMENTuP
/// E INCREMNTA.. PELA QUANTIDADES DE VENDA ATUAL.. 

if (Check::IntCheck($Ar['mes'], $Ar['id_prod']) == true):

       //// AQUI ELE CRIAR O ARRAY DADOS PARA PASSA PRA MINHA GENERIC CROUD CREATE, 
    /// USANDO METODO DE INCREMNTAR O PRODUTO SOLICITANDO ANTES DISSO ELE JA 
    // VIRIFICOU SE PRECISA OU NAO INCRMENTA-LO SE ELE NESTE MES FOI INICIADO 
    // NO RELATORIO (INCLUDO).

    $Dados = [ 'qnt_vendas' => Check::IncrementUp($Ar['id_prod'], $Ar['qnt_vendas'])];
    $Up = new Update;
    $Up->ExeUpdate("relatorio", $Dados, "WHERE id_prod = :id", "id={$Ar['id_prod']}");
else:
    /// AGORA SE MEUS METODO ME RETONOU QUE ESTE MES.. ATUAL
    //ELE NAO FOI INICIADO UM REGISTRO NO RELATORIO ELE CADASTRO
    // O PRODUTO NO RELATORIO REFRENTE ESTÉ MES.. E PRÓXIMO
    // PROTODUTO COMRPADO JÁ VAI SER AUTOINCREMENTADO

    $Cred = new Create();
    $Cred->ExeCreate("relatorio", $Ar);
   
    endif;
   
 