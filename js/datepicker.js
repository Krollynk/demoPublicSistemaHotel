$(function(){
    $("#datepicker").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: new Date()
    });
})

$(function(){
    $("#datepicker2").datepicker({
        dateFormat: 'yy-mm-dd',
        minDate: new Date()
    });
})

function calcular_dias(){
    var fecha_inicio = new Date(document.getElementById('datepicker').value);
    var fecha_fin = new Date(document.getElementById('datepicker2').value);
    const fecha = new Date().toLocaleDateString();
    var dias = (parseInt((fecha_fin - fecha_inicio)/(1000*60*60*24)));

    console.log(fecha_inicio);
    console.log(fecha_fin);
    console.log(fecha);
    console.log(dias);
    
    return dias;
}

function calcular_precio(){
    var dias = calcular_dias();
    var precio = parseInt(document.getElementById('precio').value);

    var precio_final = precio * dias;
    console.log(precio);
    console.log(precio_final);

    return precio_final;
}

$('#datepicker2').change(function(){
    $('#diascalculados').text(calcular_dias());
    $('#subtotal').text("Q" + calcular_precio());
    document.getElementById('preciofinal').value = "Q" + calcular_precio();
    document.getElementById('dias').value = calcular_dias();
});