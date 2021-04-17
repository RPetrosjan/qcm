import '../../styles/block/questions.scss'

$('.questioncheck').click(function (){
    $(this).toggleClass('active');
});

$('.questioncheckvalid').click(function (){



    let objets = $(this).closest('.card-body').find('.questioncheck');
    $(objets).each(function (){
        let reponse  = true;

        if($(this).hasClass('active') || $(this).attr('data') == 'Vrai')
        {
            if($(this).hasClass('active') && $(this).attr('data') == 'Faux'){
                reponse = false;
                $(this).addClass('backred');
            }
            if(!$(this).hasClass('active') && $(this).attr('data') == 'Vrai') {
                reponse = false;
                $(this).addClass('backyellow');
            }

            if(reponse == true) {
                $(this).addClass('backsucces');
            }
        }




    });
});
