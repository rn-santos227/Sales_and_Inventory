$(document).ready(function(e) {
<<<<<<< HEAD
=======
    console.log($('#show').val());

>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
    if($('#show').data('value') == 1) {
        showReceipt(e);
    }


<<<<<<< HEAD
    $('.accordion-section-title').click(function(e) {       
        var currentAttrValue = $(this).data('accordion');
        showReceipt(e, currentAttrValue);
    });

    function showReceipt(e, currentAttrValue) {
=======
    $('.accordion-section-title').click(function(e) {
        showReceipt(e);
    });

    function showReceipt(e) {
        var currentAttrValue = $('.accordion-section-title').attr('href');
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
        if($(e.target).is('.active')) {
            close_accordion_section();
        }else {
            close_accordion_section();

            // Add active class to section title
            $('.accordion-section-title').addClass('active');
            // Open up the hidden content panel
            $('.accordion ' + currentAttrValue).slideDown(300).addClass('open'); 
        }    
    }

    function close_accordion_section() {
        $('.accordion .accordion-section-title').removeClass('active');
        $('.accordion .accordion-section-content').slideUp(300).removeClass('open');
    }
});