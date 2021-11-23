<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- Icones -->    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    <!-- Estilo --> 
    <link rel="stylesheet" type="text/css" href="public/css/estilo.css">
    
    <title>Litoral Óleo</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light pb-5" style="background-color: #DDF5DD">
        <a href="index.html" class="navbar-brand"><img id="logo" src="public/imagens/logo2.png" width="100px" style="margin-left: 60px;"></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navtarget3">
          <span class="navbar-toggler-icon"></span>

        </button>
      
        <div class="collapse navbar-collapse" id="navtarget3">
          
          <ul class="navbar-nav ml-auto">
                    
          <li class="nav-item mr-2"><a href="trabalho.php" class="font-weight-bold lead nav-link">Nosso Trabalho</a></li>
          <li class="nav-item mr-2"><a href="historia.php" class="font-weight-bold lead nav-link">Nossa História</a></li>         
          <li class="nav-item mr-2"><a href="preservacao.php" class="font-weight-bold lead nav-link">Preservação Ambiental</a></li>
          <li class="nav-item mr-2"><a href="parceiros.php" class="font-weight-bold lead nav-link">Parceiros</a></li>
          <li class="nav-item mr-2"><a href="views/login.php" class="font-weight-bold lead nav-link">Acesso</a></li>   

          </ul>    
        </div>        
      </nav>

      <div class="container">

          <div class="row justify-content-center ">

        <div id="carousel-ctrl3" class="mt-3 carousel slide col-sm-8 " data-ride="carousel">
              
            <ol class="carousel-indicators">
              
              <li class="active" data-target="carousel-ctrl2" data-slide-to="0"></li>
              <li data-target="carousel-ctrl2" data-slide-to="1"></li>
              <li data-target="carousel-ctrl2" data-slide-to="2"></li>

            </ol>  

            <div class="carousel-inner rounded">
              <div class="carousel-item active">
                <img src="../public/imagens/foto001.png" class="img-fluid">  
              </div>
              <div class="carousel-item">
                <img src="../public/imagens/foto002.png" class="img-fluid">
              </div>
              <div class="carousel-item">
                <img src="../public/imagens/foto003.png" class="img-fluid"> 
              </div>
            </div>
            <a href="#carousel-ctrl3" class="carousel-control-prev" data-slide="prev">
              <i class="fas fa-arrow-circle-left fa-2x"></i></a>
            <a href="#carousel-ctrl3" class="carousel-control-next" data-slide="next">
              <i class="fas fa-arrow-circle-right fa-2x"></i>
              </a>
          </div>
          </div>
          
          <div class="row justify-content-center mt-3">
            <div class="col-sm-9">
              <div class="jumbotron text-center mt-2 bordaJumbo" style="background-color: #40B3DF
"> 
              <h1 class="display-4 font-weight-bold tituloJumbo"><span class="display-4 font-weight-bold tituloJumbo2">Compro</span> seu Óleo de Fritura Usado</h1>
              <p class="lead textoJumbo">Nossa equipe está pronta para coletar seu óleo de fritura usado, seja na sua casa ou em seu estabelecimento!</p>
              <hr>
              <p class="textoJumbo">Agende agora sua coleta!</p>
              <a class="btn solicitarColeta text-dark align-self-center font-weight-bold" href="https://api.whatsapp.com/send?phone=5513997444636&text=Ol%C3%A1%20tenho%20%C3%B3leo%20para%20ser%20coletado%2C%20quero%20agendar%20uma%20col%C3%A9ta!"><i class="fab fa-whatsapp fa-1x mr-2"></i>SOLICITAR COLETA</a>
             </div>
            </div>            
          </div>
      </div>

      <div class="row justify-content-center">
        <div class="card col-md-8 mb-5 text-white">
                
           <div class="card-body">
            <h4 class="card-title display-4 font-weight-bold text-primary">10 anos de história</h4>
            <h3 class="card-subtitle font-weight-bold text-primary ">Lutando pela preservação na  Baixada Santista</h3>
            <p class="card-text text-dark font-weight-bold lead">A dez anos atrás vinha ao mundo uma ideia, a Litoral Óleo. Com uma equipe especializada, excelência e visão vem construindo seu nome durante todos esses anos. A Litoral Óleo coleta óleo de fritura usado em todas as cidades da Baixada Santista, Litoral Sul e Norte de São Paulo.</p>
            <a class="btn btn-primary" href="">Leia mais</a>
           </div>      
           </div>        
      </div>

      <footer class="p-2 lead" style="background-color: #DDF5DD;">
        <h1 class="text-center lead">Siga nossas Redes Sociais</h1>
          <nav class="navbar navbar-expand-md row">
              <div class="col-sm-4 text-center">            
                <a class="nav-link lead font-weight-bold text-dark" href="https://m.facebook.com/LitoralOleo/?locale2=pt_BR"><i class="fab fa-facebook-square fa-2x"></i></a>            
              </div>
              <div class="col-sm-4 text-center">  
                <a class="nav-link lead font-weight-bold text-dark" href="https://www.instagram.com/litoraloleo/"><i class="fab fa-instagram-square fa-2x"></i>
</a>
              </div>
              <div class="col-sm-4 text-center">  
                <a class="nav-link lead font-weight-bold text-dark" href="#"><i class="fab fa-youtube-square fa-2x"></i></a>
              </div>                    
          </nav>  
          <hr>
        <div class="ml-3">
          <i class="fas fa-map-marker-alt"></i>
          <span class="small text-left">Rua Maria Rosa Correia, Nº 333, Praia Grande-SP</span><br>
        </div>
        <div class="ml-3">
          <i class="fab fa-whatsapp"></i>
          <span class="small">Telefone: (13) 97421-1332</span><br>
        </div>
        <div class="ml-3">
          <i class="fas fa-envelope"></i>
          <span class="small">E-mail: litoraloleocoleta@gmail.com</span><br>
        </div>
          <hr>          
        <div class="text-center mt-3">          
          <span class="font-weight-bold lead">Litoral Óleo &reg; - 2011</span><br>
        </div>      
      </footer>

    
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>