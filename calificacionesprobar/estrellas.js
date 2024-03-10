var contador;
function calificar(item){
    console.log(item);
    contador=item.id[0];
    console.log(contador)
    let nombre = item.id.substring(1)
    for(let i=0;i<5;i++){
        if(i<contador){
            document.getElementById((i+1)+nombre).style.color="orange";
        }
    }
}