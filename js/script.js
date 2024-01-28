let upload1 = document.getElementById('upload1');
let area1 = document.getElementById('textArea1');
let upload2 = document.getElementById('upload2');
let area2 = document.getElementById('textArea2');
let upload3 = document.getElementById('upload3');
let area3 = document.getElementById('textArea3');

upload1.addEventListener("change", () => {
    let fr = new FileReader();
    fr.readAsText(upload1.files[0]);

    fr.onload = function() {
        area1.value = fr.result; // Use 'value' instead of 'innerHTML'
    };
});

upload2.addEventListener("change", () => {
    let fr = new FileReader();
    fr.readAsText(upload2.files[0]);

    fr.onload = function() {
        area2.value = fr.result; // Use 'value' instead of 'innerHTML'
    };
});

upload3.addEventListener("change", () => {
    let fr = new FileReader();
    fr.readAsText(upload3.files[0]);

    fr.onload = function() {
        area3.value = fr.result; // Use 'value' instead of 'innerHTML'
    };
});

function copyToClipboard(textAreaId) {
    let textArea = document.getElementById(textAreaId);
    textArea.select();
    document.execCommand("copy");

    // Display a subtle notification
    let notificationAreaId = "notafication_" + textAreaId;
    console.log(notificationAreaId);
    let notificationArea = document.getElementById(notificationAreaId);
    console.log(notificationArea);
    notificationArea.innerHTML = "Text copied to clipboard";

    setTimeout(function() {
        notificationArea.innerHTML = "";
    }, 2000);
}
