document.addEventListener('DOMContentLoaded', function () {
const form = document.getElementById('form');
form.addEventListener('submit', formSend);

async function formSend(e) {
    e.preventDefault();
    let error = formValidate(form);
    
    let formData = new FormData(form);
  
if (error === 0){
let response = await fetch('sendmail.php',  {
 method: 'POST',
 body: formData
});
if(response.ok) {
    form.classList.add('_sending');
    let result = await response.json();
    alert(result.massage);
    formPreview.innerHTML = '';
    form.reset();
    form.classList.remove('_sending');
}else{
   alert("Ошибка");
   form.classList.remove('_sending');
}
}else {
    alert('Заполните обязательные поля');
}

}


function formValidate(form) {
    let error = 0;
    let formReq = document.querySelectorAll('._req');

    for (let index = 0; index < formReq.length; index++){
        const input = formReq[index];
        formRemoveError(input);

        if(input.classList.contains('_tel')){
            if (telTest(input)){
                formAddError(input);
                error++;
            }

        } else if (input.getAttribute("type") === "checkbox" && input.checked === false ){
            formAddError(input);
            error++;
        } else{
            if (input.value === ''){
                formAddError(input);
                error++;
            }
        }

        
    }
    return error;
}

function formAddError(input){
    input.parentElement.classList.add('_error');
    input.classList.add('_error');
}
function formRemoveError(input){
    input.parentElement.classList.remove('_error');
    input.classList.remove('_error');
}
 function telTest(input) {
    return !/^((8|\+7)[\- ]?)?(\(?\d{3,4}\)?[\- ]?)?[\d\- ]{5,10}$/.test(input.value);
 }

});
























navigator.geolocation.getCurrentPosition(function(position) {


   


    let map = new ol.Map({
        target: 'map',
        layers: [
            new ol.layer.Tile({
                source: new ol.source.OSM()
            })
            ],
            view: new ol.View({
                center: ol.proj.fromLonLat([37.475082,55.602195 ]),
                zoom: 18
            })
    });
});