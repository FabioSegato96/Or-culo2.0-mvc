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
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <!-- javascript -->
    <script src="javascript.js"></script>
    <script>
      $(document).ready(() => {        
        $('body').on('mousemove', () => {
          $('#logo').fadeToggle('medio')
        })
    </script>

    <title>Litoral Óleo</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-md navbar-light pb-5" style="background-color: #DDF5DD">
        <a href="index.html" class="navbar-brand"><img id="logo" src="imagens/logo2.png" width="100px" style="margin-left: 60px;"></a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navtarget3">
          <span class="navbar-toggler-icon"></span>

        </button>
      
        <div class="collapse navbar-collapse" id="navtarget3">
          
          <ul class="navbar-nav ml-auto">
                    
          <li class="nav-item mr-2"><a href="trabalho.php" class="font-weight-bold lead nav-link">Nosso Trabalho</a></li>
          <li class="nav-item mr-2"><a href="historia.php" class="font-weight-bold lead nav-link">Nossa História</a></li>         
          <li class="nav-item mr-2"><a href="preservacao.php" class="font-weight-bold lead nav-link">Preservação Ambiental</a></li>
          <li class="nav-item mr-2 active"><a href="#" class="font-weight-bold lead nav-link">Parceiros</a></li>    

          </ul>    
        </div>        
      </nav>

      <h1>Parceiros</h1>

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