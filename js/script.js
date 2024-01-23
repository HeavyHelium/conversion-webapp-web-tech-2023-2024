let upload1 = document.getElementById('upload1');
let area1 = document.getElementById('textArea1');
let upload2 = document.getElementById('upload2');
let area2 = document.getElementById('textArea2');
let upload3 = document.getElementById('upload3');
let area3 = document.getElementById('textArea3');

upload1.addEventListener("change", ()=>{
    let fr = new FileReader();
    fr.readAsText(upload1.files[0]);

    fr.onload = function() {
        area1.innerHTML = fr.result;
    };
});

upload2.addEventListener("change", ()=>{
    let fr = new FileReader();
    fr.readAsText(upload2.files[0]);

    fr.onload = function() {
        area2.innerHTML = fr.result;
    };
});

upload3.addEventListener("change", ()=>{
    let fr = new FileReader();
    fr.readAsText(upload3.files[0]);

    fr.onload = function() {
        area3.innerHTML = fr.result;
    };
});