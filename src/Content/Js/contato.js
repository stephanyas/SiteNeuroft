// Formulario de Contato
$('#formContato').submit(function(event){
    event.preventDefault();    
    var nome = $('#nome').val();
    var assunto = $('#assunto').val();
    var email = $('#email').val();
    var mensagem = $('#mensagem').val();
    if(nome.length> 0 && assunto.length > 0 && email.length > 0 && mensagem.length > 0){
        $.get( "Content/Api/email.php", { nome: nome, assunto: assunto, email: email, mensagem: mensagem } );
        $('#nome').val("");
        $('#assunto').val("");
        $('#email').val("");
        $('#mensagem').val("");
        $('#sucess-modal').modal();
    }else{
        $('#required-field-modal').modal();
    }
  });
  
  $('#btn-ok-enviado').click(function(){
    $(location).attr("href", "index.html");
  });