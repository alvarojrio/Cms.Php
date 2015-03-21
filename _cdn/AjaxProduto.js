//
//Inicialização do Storage.
//
storage = window.localStorage;
cache = window.storage.clear();




$(document).on('click', '.ajaxmin a', function (e) {


    storage.setItem('id', $(this).attr('data-type'));
    var idProduct = storage.getItem('id');

alert(idProduct);
    $.ajax({
        url: '_cdn/ajax/ProductInput.php',
        type: "post",
        data:  {acao: idProduct} ,
        success: function (data) {
            
alert("Item Comprado com sucesso");
                console.log(data);
        }
    });


});