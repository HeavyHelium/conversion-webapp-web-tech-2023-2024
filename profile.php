<?php

include_once "header_logged.php";

?>
<div class=conv-section>
    <div><h1>JSON ↔ Properties</h1></div>
<label for="textArea1">Area 1</label>
    <textarea id="textArea1" rows="4" cols="50"></textarea>

    <label for="textArea2">Area 2</label>
    <textarea id="textArea2" rows="4" cols="50"></textarea>

    <label for="textArea3">Area 3</label>
    <textarea id="textArea3" rows="4" cols="50"></textarea>

    <br>

    <input type="file" id="uploadButton" accept=".txt">

    <br>

    <button onclick="convertText()">Convert Text</button>
</div>
    

<?php

include_once "footer.php"
?>