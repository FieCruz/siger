
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

$("select[name='state_id']").change(function () {
    option = $("select[name='state_id'] option:selected").val();
    $.ajax({
        dataType: "json",
        url: '/cidades/uf/' + option,
        success: function success(data) {
            $("select#cidade").find('option').remove();
            $.each(data, function (id, name) {
                $("select#cidade").append().append($('<option>', { value: cidade.id }).text(cidade.name));
            })
        }
    });
});