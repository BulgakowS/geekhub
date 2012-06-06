$(document).ready(function(){
    
    $('#pncheck').tzCheckbox({ labels: [ 'Позитивный', 'Негативный' ] });
    
    setTimeout(function(){
       $('.alert-notice').fadeOut();
       $('.alert-error').fadeOut();
       $('.alert-success').fadeOut();
    }, 3000 );

    $(".full").fullsize({shadow: true});

});
