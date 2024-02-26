<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conversor de  MOEDAS API</title>
</head>
<style>
     .conteiner {
            font-family:system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 5px;
            padding: 20px;
            box-shadow: 0 0 10px black;
            text-align: center;
        }
        body{
            background-color: #0a4f57;
        }
    
</style>
<body>
    <div class="conteiner">

         <h1>Conversor de Moedas  utilizando API do Banco Central </h1>
        <p>Digite um valor</p>
        <P>BRL -> USD</P>


        
        <form action="index.php" method="post">
        <input type="text" name="valor" placeholder="Digite um Valor aqui em BRL">
        <input type="submit" >
        </form>

        <span> 
          

        
                <?php 

                
                       if(isset($_POST['valor'])){

                        $valor = $_POST['valor'];

                         $din = (float) $valor; //converte a string em float;

                        


                        if(is_float($din) && $din != 0){

                            
                            $data = date('d-m-Y');
                            $real = $din;



                                    
                            $url = 'https://olinda.bcb.gov.br/olinda/servico/PTAX/versao/v1/odata/CotacaoDolarPeriodo(dataInicial=@dataInicial,dataFinalCotacao=@dataFinalCotacao)?@dataInicial=\'02-19-2024\'&@dataFinalCotacao=\'02-26-2024\'&$top=1&$orderby=dataHoraCotacao%20desc&$format=json&$select=cotacaoCompra,dataHoraCotacao';        
                             
                             
                               $dados = json_decode(file_get_contents($url),true);
                               $cotacao = $dados['value'][0]["cotacaoCompra"];
                               $valor = $real / round($cotacao)  ;


                               echo '<h2>Voce tera : $' .$valor .' USD </h2>'; 

                        }else{
                            echo '<span> <BR> O VALOR DIGITADO NÃO É NÚMERICO</span>';
                            unset($_POST);
                        }


                        
                          




                        } 
                  
                   

                
                ?>
          
        </span>




    </div>    



</body>
</html>