<html>
    <head>
        <title>Exercício de Lógica</title>
        <meta charset="utf-8">
    </head>
    <body>
        <?php if(empty($_POST)): ?>
        <?php //FORMULÁRIO SERÁ IMPRESSO SOMENTE SE NENHUM DADO TIVER SIDO ENVIADO VIA POST?>
            <form method="post">
                <input type="number" name="a" placeholder="peso a">
                <input type="number" name="b" placeholder="peso b">
                <input type="number" name="c" placeholder="peso c">
                <input type="number" name="d" placeholder="peso d">
                <input type="submit" value="Checar Equilibrio">
            </form>
        <?php endif;?>
    </body>
</html>

<?php
    //SE O POST NÃO ESTIVER VAZIO...
    if(!empty($_POST)){
        //CRIARÁ UM ARRAY COM OS PESOS...
        $pesos = array();
        $pesos['a'] = $_POST['a'];
        $pesos['b'] = $_POST['b'];
        $pesos['c'] = $_POST['c'];
        $pesos['d'] = $_POST['d'];
        //CRIARÁ VARIÁVEL DE ERRO COM VALOR FALSO...
        $erro = false;
        //FOREACH PERCORRERÁ O ARRAY COM OS PESOS PARA VER SE SÃO MENORES QUE 1 OU MAIORES QUE 1000...
        foreach($pesos as $peso){
            if($peso < 1 || $peso >1000){
                //SE FOR, VARIÁVEL DE ERRO RECEBE VERDADEIRO E FOREACH É PARADO...
                $erro = true;
                break;
            }
        }
        //SE VARIÁVEL DE ERRO VALER FALSO, SIGNIFICA QUE PESOS ESTÃO NA FAIXA ENTRE 1 E 1000, ENTÃO...
        if($erro == false){
            //SERÁ CHECADO SE PESOS NÃO SATISFAZEM A EQUAÇÃO: A+B = C+2D...
            if(!($pesos['a'] + $pesos['b'] == $pesos['c'] + (2*$pesos['d']))){
                //SE NÃO SATISFAZEREM, A VARIÁVEL DE ERRO RECEBE VALOR VERDADEIRO...
                $erro = true;
            }    
        }
        
        //NO FINAL, SE VARIÁVEL ERRO FOR VERDADEIRA, UM 'N' SERÁ IMPRESSO NO CORPO DO NAVEGADOR, CASO CONTRÁRIO, UM 'S' SERÁ IMPRESSO!
        echo ($erro == true) ? 'N' : 'S';

    }
    
?>