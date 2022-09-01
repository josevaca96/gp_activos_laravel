
// var checkbox = document.getElementById('check_all');
// checkbox.addEventListener( 'change', function() {
//     if(this.checked) {
//        alert('checkbox esta seleccionado');
//     }
// });
function verificar(){
    var checkbox = document.getElementById('check_all').checked;
    var input_user = document.getElementById('tags');
    if(checkbox){
        input_user.style.display = 'none';
        input_user.value=null;            
        input_user.disabled = true;

    }else{
        input_user.style.display = 'block';
    }

}

