//
//Inicialização do Storage.
//
storage = window.localStorage;
cache = window.storage.clear();




$(document).on('click', '.ajaxmin button', function (e) {


    storage.setItem('id', $(this).attr('data-type'));
    var idProduct = storage.getItem('id');


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