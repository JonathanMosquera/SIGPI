/* 
 * Dev: Jhon sebastian Ortiz P.
 */

$(document).ready(function () {
    loadDrop();
    $('#formTarea form').submit(function () {
        $('.tareaBoard.a').find('.tareaContainer').append('<div class="tarea a btn btn-success"><span>x</span><p><a id="jonaMA">' + $('#formTarea form input').val() + '</a></p></div>');
        $('.tarea').fadeIn();
        $('#formTarea form input').val('');
        loadDrag();
		ventana();
        cerrarTarea();
        return false;
    });

    //Funciones
	
	function ventana() {
    //editamos datos del usuario
    $("#jonaMA").on('click', function () {
$("#meumodal").modal("show");
});
}

    function cerrarTarea() {
        $('.tarea span').click(function () {
            $(this).parent().fadeOut(function () {
                $(this).remove();
            });
        });
    }

    function loadDrag() {
        $('.tarea').draggable({
            helper: 'clone',
            revert: 'invalid'
        });
    }

    function loadDrop() {
        $('.tareaBoard').droppable({
            activeClass: 'active',
            tolerance: 'pointer',
            drop: function (ev, ui) {
                var elemento = ui.draggable;
                $(this).find('.tareaContainer').prepend(elemento);
                setClass();
            }
        });

        $('.tareaBoard.a').droppable({
            accept: '.tarea.a'
        });

        $('.tareaBoard.b').droppable({
            accept: '.tarea.a'
        });

        $('.tareaBoard.c').droppable({
            accept: '.tarea.a, .tarea.b'
        });
        loadDrag();
    }

    function setClass() {
        $('.tareaBoard.b').find('.tarea.a').removeClass('a');
        $('.tareaBoard.b').find('.tarea').addClass('b');
        $('.tareaBoard.c').find('.tarea.b').removeClass('b');
        $('.tareaBoard.c').find('.tarea.a').removeClass('a');
        $('.tareaBoard.c').find('.tarea').addClass('c');
    }

});