<html>
  <head>
    <meta charset="utf-8" />
    <title>Oráculo 2.0</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../public/css/estilo.css">
    <style>
      .card-login {
        padding: 60px 0 0 0;
        width: 50px;
        margin: 0 auto;
      }      
    </style>
    <link rel="stylesheet" href="../public/css/estilo.css">
    <link rel="shortcut icon" type="imagex/png" href="../public/imagens/portal_oraculo.ico">
    <style type="text/css">
      @font-face{font-family: "Adventure";
      src: url(../public/fontes/unbutton.woff) ;}   

      #tituloOraculo{
        font-size: 1.5em;
        font-family: "Adventure";
      }
      body{font-family: FreeMono, monospace;}
    </style>    
  </head>

  <body>

    <nav class="navbar navbar-light bg-light pb-5" style="background-color: #DDF5DD">
        <a href="#" class="navbar-brand display-2 ml-5">
          <img src="../public/imagens/logo2.png" width="60" height="50" class="d-inline-block align-items-center " id="nome_app" alt="" class="ml-5" style="margin-left: 60px;">
          <span class="ml-4" id="tituloOraculo">
            Oraculo 2.0
          </span>
        </a>         
    </nav>

    <div class="container">    
      <div class="row">

        <div class="card-login col-sm-6">
          <div class="card">
            <div class="card-header">
              Login
            </div>
            <div class="card-body">
              <form action="../config/valida_login.php?acao=recuperarUsuario" method="post">
                <div class="form-group">
                  <input name="email" type="email" class="form-control" placeholder="E-mail">
                </div>
                <div class="form-group">
                  <input name="senha" type="password" class="form-control" placeholder="Senha">
                  <?php if(isset($_GET['login']) && $_GET['login'] == 'erro'){?>
                    <div class="text-danger">Usuário ou senha invalido(s).</div>
                  <?php };?>
                  <?php if(isset($_GET['login']) && $_GET['login'] == 'erro2'){?>
                    <div class="text-warning">Faça login antes de acessar outras páginas.</div>
                  <?php };?> 



                </div>
                <button class="btn btn-lg btn-success btn-block" name="entrar" type="submit">Entrar</button>                
              </form>
            </div>
          </div>
        </div>
    </div>
  </body>
</html>