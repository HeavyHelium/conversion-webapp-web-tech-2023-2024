function validateAndConvertText() {
    let areas = [
        document.getElementById('textArea1'),
        document.getElementById('textArea2'),
        document.getElementById('textArea3')
    ];

    let area4 = document.getElementById('textArea4');

    for (let i = 0; i < areas.length; i++) {
        let currentArea = areas[i];
        if (currentArea.value.trim() === "" && currentArea.name == "config") {
            alert("area cannot be empty. Please provide configuration details.");
            return;
        }
    }

    let conversionForm = document.getElementById("conversionForm");

    conversionForm.submit();
}
