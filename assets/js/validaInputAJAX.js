var x;

function validacao(inp) {

    var password = $("#password").val();

    var input = $([type = inp]);
    var type = input.attr("type");
    var name = input.attr("name");
    var span = input.next();
    var icon = span.find('i');
    var parent = input.parent();
    var small = parent.next();
    var value = input.val();
    var valida = true;
    var mensagem = "";

    if (value != "") {

        if (type == 'password' && name == 'password') {
            if (value.length < 4) {
                mensagem = "O campo deve conter no minimo 4 caracteres!";
                valida = false;
            } else {
                if (!value.match(/[1-9]+/g)) {
                    mensagem = "A password deve conter pelo menos um digito!";
                    valida = false;
                    re_password(false);
                } else {
                    re_password(true);
                }
            }
        } else if (type == 'email') {
            if (!value.match(/@+/g)) {
                mensagem = "Inclua um '\@\' apos '\'" + value + "'\' no endereco de email!";
                valida = false;
            } else if (!value.match(/[a-b0-9]+/g)) {
                mensagem = "Email esta incompleto. Adiciona outra parte apos '\@\'!"
                valida = false;
            }
        } else if (name == 're-password') {
            if (value != password) {
                mensagem = "As passwords sao diferentes!"
                valida = false;
            }
        }



    } else {
        re_password(false);
        mensagem = "Preencha o campo!";
        valida = false;
    }

    if (valida) {
        span.show();
        icon.removeClass("fas fa-x");
        icon.removeClass("text-danger");
        input.removeClass("border-danger");

        icon.addClass('fas fa-check');
        icon.addClass('text-success');
        input.addClass('border-success');

        small.text("");
    } else {
        span.show();
        icon.removeClass("fas fa-check");
        icon.removeClass("text-success");
        input.removeClass('border-success');

        icon.addClass('fas fa-x');
        icon.addClass('text-danger');
        input.addClass('border-danger');

        small.text(mensagem);
    }


    blockSubmit();

}

function re_password(bool) {
    var input = $("#re-password");
    var span = input.next();
    var icon = span.find('i');
    var parent = input.parent();
    var small = parent.next();

    if (bool) {
        input.removeAttr('disabled');
    } else {
        input.attr('disabled', 'disabled');
        small.text("");

        input.val("");
        span.hide();
        icon.removeClass("fas fa-x");
        icon.removeClass("text-danger");
        input.removeClass("border-danger");
        icon.removeClass("fas fa-check");
        icon.removeClass("text-success");
        input.removeClass('border-success');
    }

}

var count
function blockSubmit() {
    count = 0;

    for (let index = 0; index < $('small').length; index++) {

        if ($('small')[index].innerHTML != "") {
            count++;
        }

    }

    if (count > 0) {
        $('.btn-success').addClass('disabled');
    } else {
        $('.btn-success').removeClass('disabled');
    }

}


