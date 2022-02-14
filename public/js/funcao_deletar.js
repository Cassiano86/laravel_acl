let radio = document.getElementById('radio_deletar');
radio.addEventListener('change', function(){
    document.getElementById("radio_deletar").checked == true 
            ? 
    document.getElementById("btn_deletar").disabled = false 
            : 
    document.getElementById("btn_deletar").disabled = true;
});
