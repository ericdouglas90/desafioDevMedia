<?php
require 'config.php';
require 'dao/NoticiaDaoMysql.php';

$noticiaDao = new NoticiaDaoMysql($pdo);

$list = $noticiaDao->findAll();

$searh = filter_input(INPUT_GET, 'search');
$searchList = false;

if($searh) {

  $searchList = $noticiaDao->findByNoticia($searh);
  
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Portal Noticias</title>
  <link rel="stylesheet" href="<?=$base?>/assets/style.css">
</head>
<body>
  
  <header>
    <div class="container">

      <div class="topo">
      
          <div class="logo">
            LOGO
          </div>
          <div class="topo-nav">
            <div class="btn-modal">
              CADASTRAR NOTÍCIAS
            </div>
            <div >
              EXIBIR NOTÍCIAS
            </div>
            <form method="get">
            <input type="search" name="search" ><input type="submit" value="pesquisar">
            </form>
          </div>

      </div>

    </div>
  </header>

  <main>
    <div class="modal-hidden">
      <div class="modal">

        <form action="adicionar.php" method="post">
          <label>
            Titulo da Notícia: <br>
            <input type="text" name="title" />
          </label>
          <br><br>
          Notícia: <br>
          <textarea name="body"  >

          </textarea>
          <br><br>
          <input type="submit" value="Adicionar">
        </form>

      </div>
    </div>
    <div class="container">

      <section class="noticias">

        <div class="noticias-group">
          
          <?php if($searchList):?>
            
            <?php foreach($searchList as $noticia):?>
              <div class="noticia">
                <h3><?=$noticia->getTitle()?></h3>
                <p><?=$noticia->getBody();?></p>
              </div> 
            <?php endforeach;?>
          <?php else:?>
            <?php foreach($list as $noticia):?>
              <div class="noticia">
                <h3><?=$noticia->getTitle()?></h3>
                <p><?=$noticia->getBody();?></p>
              </div> 
            <?php endforeach;?>
          <?php endif;?>

        </div>

      </section>

    </div>

  </main>

 <footer>
   <div class="container">
    <div class="footer">
      DESENVOLVIDO POR PROGRAMADOR
    </div>
   </div>
 </footer>
 <script src="<?=$base?>/assets/index.js"></script>
</body>
</html>