<?php

/**
 * Check.class [ HELPER ]
 * Classe responável por manipular e validade dados do sistema!
 * 
 * @copyright (c) 2015, Alvaro Jr
 */
class Check {

    private static $Data;
    private static $Format;

    /**
     * <b>Verifica E-mail:</b> Executa validação de formato de e-mail. Se for um email válido retorna true, ou retorna false.
     * @param STRING $Email = Uma conta de e-mail
     * @return BOOL = True para um email válido, ou false
     */
    public static function Email($Email) {
        self::$Data = (string) $Email;
        self::$Format = '/[a-z0-9_\.\-]+@[a-z0-9_\.\-]*[a-z0-9_\.\-]+\.[a-z]{2,4}$/';

        if (preg_match(self::$Format, self::$Data)):
            return true;
        else:
            return false;
        endif;
    }

    /**
     * <b>Tranforma URL:</b> Tranforma uma string no formato de URL amigável e retorna o a string convertida!
     * @param STRING $Name = Uma string qualquer
     * @return STRING = $Data = Uma URL amigável válida
     */
    public static function Name($Name) {
        self::$Format = array();
        self::$Format['a'] = 'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜüÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿRr"!@#$%&*()_-+={[}]/?;:.,\\\'<>°ºª';
        self::$Format['b'] = 'aaaaaaaceeeeiiiidnoooooouuuuuybsaaaaaaaceeeeiiiidnoooooouuuyybyRr                                 ';

        self::$Data = strtr(utf8_decode($Name), utf8_decode(self::$Format['a']), self::$Format['b']);
        self::$Data = strip_tags(trim(self::$Data));
        self::$Data = str_replace(' ', '-', self::$Data);
        self::$Data = str_replace(array('-----', '----', '---', '--'), '-', self::$Data);

        return strtolower(utf8_encode(self::$Data));
    }

    /**
     * <b>Tranforma Data:</b> Transforma uma data no formato DD/MM/YY em uma data no formato TIMESTAMP!
     * @param STRING $Name = Data em (d/m/Y) ou (d/m/Y H:i:s)
     * @return STRING = $Data = Data no formato timestamp!
     */
    public static function Data($Data) {
        self::$Format = explode(' ', $Data);
        self::$Data = explode('/', self::$Format[0]);

        if (empty(self::$Format[1])):
            self::$Format[1] = date('H:i:s');
        endif;

        self::$Data = self::$Data[2] . '-' . self::$Data[1] . '-' . self::$Data[0] . ' ' . self::$Format[1];
        return self::$Data;
    }

    /**
     * <b>Limita os Palavras:</b> Limita a quantidade de palavras a serem exibidas em uma string!
     * @param STRING $String = Uma string qualquer
     * @return INT = $Limite = String limitada pelo $Limite
     */
    public static function Words($String, $Limite, $Pointer = null) {
        self::$Data = strip_tags(trim($String));
        self::$Format = (int) $Limite;

        $ArrWords = explode(' ', self::$Data);
        $NumWords = count($ArrWords);
        $NewWords = implode(' ', array_slice($ArrWords, 0, self::$Format));

        $Pointer = (empty($Pointer) ? '...' : ' ' . $Pointer );
        $Result = ( self::$Format < $NumWords ? $NewWords . $Pointer : self::$Data );
        return $Result;
    }

    /**
     * <b>Obter categoria:</b> Informe o name (url) de uma categoria para obter o ID da mesma.
     * @param STRING $category_name = URL da categoria
     * @return INT $category_id = id da categoria informada
     */
    public static function CatByName($CategoryName) {
        $read = new Read;
        $read->ExeRead('ws_categories', "WHERE category_name = :name", "name={$CategoryName}");
        if ($read->getRowCount()):
            return $read->getResult()[0]['category_id'];
        else:
            echo "A categoria {$CategoryName} não foi encontrada!";
            die;
        endif;
    }
 
    /**
     * <b>Verifica COD:</b> Verifica o cod_unico cadastro e pesquisa no banco para nao termos cod repetido.!
     * @param STRING $cod = Int
     */
    public static function CodUnic($cod) {
        $read = new Read;
        $read->ExeRead('plan_prod', "WHERE cod_unico = :cod", "cod={$cod}");
        if ($read->getRowCount()):

            return TRUE;
        else:

            return FALSE;
        endif;
    }

    /**
     * <b>IntCheck COD:</b> Responsavel pelo compra dos produto, manipulado e organização da tabela 'relatorio'.!
     * Sempre estará 1 produto de cada mes responsavel pela quantidades de venda do mesmo. só mudara no proximo
     * mes. para que assim fica orgazanido e coreente. para um boa estatisca de venda simples.
     * @param STRING $data = String 
     * @param Int $id = Int
     */
    public static function IntCheck($data, $id) {

    $read = new Read;

    $read->ExeRead('relatorio', "WHERE id_prod = :id", "id={$id}");
    foreach ($read->getResult() as $rd);

if($read->getResult()) {

            $datBD = explode("-", $rd['mes']);
            $datFN = explode("-", $data);

            //Verifica se são do mesmo mesmo e ano
            if ($datBD[0] == $datFN[0] && $datBD[1] == $datFN[1]):

                ///Acrecenta
               return TRUE;

            else:
                //Cadastra pois o item existe, porem são de meses 
                //Anteriores.
                return FALSE;

            endif;
        }else {

            //Cadastra o produto ainda nao está disponivel para relátorio
            return FALSE;
        }
    }
    
    
    /**
     * <b>IncrementUp:</b> Responsavel pelo auto incremento das quantidades de venda do produto.
     * @param Int $qnt = Int 
     * @param Int $id = Int
     */
    public static function IncrementUp($id, $qnt) {
        $read = new Read;
        $read->ExeRead('relatorio', "WHERE id_prod = :id", "id={$id}");
        foreach ($read->getResult() as $rd)
            ;

        return $rd['qnt_vendas'] += $qnt;
    }

    
    
    /**
     * <b>VerificarVendas:</b> Responsavel pelac constagem dos produto nada data.. que para por Param.
     * @param Int $data = Int 
     */
    public static function VerificarVendas($data) {

        $read = new Read;
                //mes atual do sistema
                $datFN = explode("-", $data);

        $read->ExeRead('relatorio');
            $contar = 0;
        foreach ($read->getResult() as $rd) {

            if ($read->getResult()) {

                //mes do banco
                $datBD = explode("-", $rd['mes']);
                

                //Verifica se são do mesmo mesmo e ano
                if ($datBD[0] == $datFN[0] && $datBD[1] == $datFN[1]):

                    $contar++;

               
                endif;
            }
        }
        
       if($contar == 0):
          echo  $contar = 0;
       else:
           echo  $contar ;
       endif;
    }
    
    
    
    
    /**
     * <b>RecorverName:</b>Responsavel por recupera o nome atrávez de um id qualquer, fazendo ligamento
     * de duas tabelas, relatorio e plan_prod, 
     * @param Int $data = Int 
     */
    
    public static function RecorverName($id) {

        $read = new Read;
        
        $read->ExeRead("plan_prod", "WHERE id = :id", "id={$id}");
        
       foreach($read->getResult() as $name):
           extract($name);
           
           echo $prod_name;
       endforeach;
            
           
          
        
}
     

  /**
     * <b>CalcMix </b>Responsavel por calcula mix 
     * @param Int $id = Int     
     * @param Int $ddte = Int 
     */
      public static function CalcMix($id,$ddte){
       $readFull = new Read();
        $readFull->FullRead("SELECT SUM(qnt_vendas) AS TotalVendas FROM relatorio");
        //var_dump($readFull->getResult());

         $read = new Read;
        $read->ExeRead('relatorio', "WHERE id_prod = :id", "id={$id}");
        foreach ($read->getResult() as $rd);

        if ($read->getResult()) {

            $datBD = explode("-", $rd['mes']);
            $datFN = explode("-", $ddte);

            //Verifica se são do mesmo mesmo e ano
            if ($datBD[0] == $datFN[0] && $datBD[1] == $datFN[1]):

                $mix = $rd['qnt_vendas'] / $readFull->getResult()[0]['TotalVendas'];
                 
                echo "<P>".Check::RecorverName($rd['id_prod'] )."</P>". $mix;
         endif;
        }
    }
    
    
    
     /**
     * <b>CalcMixNext </b>Responsavel por calcula mix do proximo mes 
     * @param Int $id = Int     
     * @param Int $ddte = Int 
     */
    public static function CalcMixNext($id,$ddte){
       $readFull = new Read();
        $readFull->FullRead("SELECT SUM(qnt_vendas) AS TotalVendas FROM relatorio");
        //var_dump($readFull->getResult());

         $read = new Read;
        $read->ExeRead('relatorio', "WHERE id_prod = :id", "id={$id}");
        foreach ($read->getResult() as $rd);

        if ($read->getResult()) {

            $datBD = explode("-", $rd['mes']);
            $datFN = explode("-", $ddte);
           
            //Verifica se são do mesmo mesmo e ano
            if ($datBD[0] == $datFN[0] && $datBD[1] == $datFN[1] ):

                $mix1 = $rd['qnt_vendas'] / $readFull->getResult()[0]['TotalVendas'];
          ///Criei esse metodo para retorna nome, pelo id.
           echo "<P>".Check::RecorverName($rd['id_prod'] )."</P>". $mix1;
         
          
          endif;
        
         
     
        }
        
       
    }
    
   

    /**
     * <b>Imagem Upload:</b> Ao executar este HELPER, ele automaticamente verifica a existencia da imagem na pasta
     * @return HTML = imagem redimencionada!
     */
    public static function Image($ImageUrl, $ImageDesc, $ImageW = null, $ImageH = null) {

        self::$Data = $ImageUrl;

        if (file_exists(self::$Data) && !is_dir(self::$Data)):
            $patch = HOME;
            $imagem = self::$Data;
            return "<img src=\"{$patch}/tim.php?src={$patch}/{$imagem}&w={$ImageW}&h={$ImageH}\" alt=\"{$ImageDesc}\" title=\"{$ImageDesc}\"/>";
        else:
            return false;
        endif;
    }

}
