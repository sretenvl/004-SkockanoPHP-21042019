<link rel="stylesheet" type="text/css" href="css/styleForme.css">
<div class="login-page">
  <div id = "pozadina"></div>
  <div class="form">
      <form class="register-form" method="POST" action="modules/register.php">
        <input type="text" name="username" placeholder="name"/>
        <input type="password" name="password" placeholder="password"/>
        <input type="email" name="email" placeholder="email address"/>
        <input type="submit" name="submit" value="Registruj se" />
        <p class="message">Already registered? <a id = "signIn" href="#">Sign In</a></p>
      </form>
      <form class="login-form" method="POST" action="modules/log.php">
        <input type="text" name="usernameL"  placeholder="username"/>
        <input type="password" name="passwordL" placeholder="password"/>
        <input type="submit" name="submit" value="Log in"/>
        <p class="message">Not registered? <a id = "account" href="#">Create an account</a></p>
      </form>
    </div>
</div>
<script type = "text/javascript" src ="js/logJQ.js"></script>