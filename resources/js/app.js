
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$('select[name="estado"]').change(function(){
    option = $("select[name='estado'] option:selected").val()
    $.ajax({
        dataType: "json",
        url: '/cidades/uf/'+option,
        success: function(data){
            $("select#cidade").find('option').remove();
            $.each(data,function (id,cidade) {
                $("select#cidade").append().append($('<option>', { value : cidade.id }).text(cidade.cidade));
            })
        }
    });
});