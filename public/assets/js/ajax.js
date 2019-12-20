$(document).ready(function () {
    $(".porcentagem").hide();

    //NOVO CONCURSO LOTOFÁCIL
    $(function() {
        $("#form_novo_concurso_lotofacil").submit(function(e) {
            $(".msgError").html("");
            $(".msgError").css("display", "none");

            let classe = $(this).attr(".msgSuccess");
            if (classe != "") {
                $(".msgSuccess").html("");
                $(".msgSuccess").css("display", "none");
            }

            e.preventDefault();
            $.ajax({
                type: "POST",
                url: $(this).attr("action"),
                data: $(this).serialize(),
                dataType: 'json',
                success: function (retorno) {
                    if (retorno.status === 'error' ) {
                        $('.retorno').html('<div class="alert alert-danger msgError text-center" id="">' + retorno.message + '</div>');
                    } else if (retorno.status === 'success'){
                        $('.retorno').html('<div class="alert msgSuccess text-center" id="">' + retorno.message + '</div>');
                    }
                },
                fail: function() {
                    alert('ERRO: Falha ao carregar o script.');
                } 
            });
        });
    });

    /*------------------------------------------------------------------------------------------------------------------*/
    $(function() {
        $("#form_import_concursos_lotofacil").submit(function(e) {
            $(".msgError").html("");
            $(".msgError").css("display", "none");

            let classe = $(this).attr(".msgSuccess");
            if (classe != "") {
                $(".msgSuccess").html("");
                $(".msgSuccess").css("display", "none");
            }       
            
            let classeW = $(this).attr(".msgWarning");
            if (classeW != "") {
                $(".msgWarning").html("");
                $(".msgWarning").css("display", "none");
            }     
            
            var formData = new FormData(this);

            e.preventDefault();
            $.ajax({
                url: $(this).attr("action"),
                type: 'POST',
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                resetForm: true,
                success: function (retorno) {
                    status = retorno.status;
                    if (retorno.status === 'error' ) {
                        $(".porcentagem").hide();
                        $('.retorno').html('<div class="alert alert-danger msgError text-center" id="">' + retorno.message + '</div>');
                    } else if (retorno.status === 'success'){
                        $('.retorno').html('<div class="alert msgSuccess text-center" id="">' + retorno.message + '</div>');
                    }
                },
                xhr: function () { 
                    var xhr = $.ajaxSettings.xhr();
                    if (xhr.upload) { // Avalia se tem suporte a propriedade upload
                        xhr.upload.onprogress = function(e) {
                            if (e.lengthComputable && status !== "error") {
                                $(".porcentagem").show();    
                                $(".progress-bar").css({'width': ((e.loaded / e.total) * 100).toFixed(0) + '%'});
                                $(".valor").html(((e.loaded / e.total) * 100).toFixed(0) + ' %');
                            }
                        };
                        $('.retorno').html('<div class="alert alert-warning msgWarning text-center" id="">Aguarde a resposta do Processamento!</div>');
                    }
                    return xhr;
                }, 
                complete: function () {
                    $(".porcentagem").hide();
                },
                error: function (retorno) {
                    alert(retorno.responseText);
                }
            });

        });
    });

});