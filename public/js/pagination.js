$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            getData(page);
        }
    }
});

$(document).ready(function()
{
    $(document).on('click', '.pagination a', function(event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();
        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];
        getData(page);
    });
});

function getData(page){
<<<<<<< HEAD
    $.ajax({
        url: '?page=' + page,
        type: "get",
        datatype: "html",
    })
    .done(function(data) {           
        $("#product_container").empty().html(data);
        location.hash = page;
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
          alert('No response from server');
    });
}

function paginationBuilder(paginate) {
    $('.pagination').empty();
    $('.pagination').append('<li class="disabled"><span>&laquo;</span></li>');
    $('.pagination').append('<li class="active"><span>1</span></li>');
    for(var i = 1; i <= paginate.last_page && i <= 8; i++) {
        var url_builder = paginate.page + '?page=' + i;
        $('.pagination').append('<li><a href="'+ url_builder +'">2</a></li>') 
    }

    if(paginate.last_page > 1) { 
        if(paginate.last_page > 8) {
             $('.pagination').append('<li class="disabled"><span>...</span></li>');
             $('.pagination').append('<li class="disabled"><a href="' + paginate.page + '?page= ' + paginate.last_page +'>'+ paginate.last_page + '</span></li>');
        }
        $('.pagination').append('<li><a href="' + paginate.page + '?page=2" rel="next">&raquo;</a></li>');
    }
    else {
        $('.pagination').append('<li class="disabled"><span>&raquo;</span></li>');
    }     
=======
        $.ajax({
            url: '?page=' + page,
            type: "get",
            datatype: "html",
        })
        .done(function(data) {           
            $("#product_container").empty().html(data);
            location.hash = page;
        })
        .fail(function(jqXHR, ajaxOptions, thrownError) {
              alert('No response from server');
        });
>>>>>>> 558c21e6c26f9043810d916b07f52d9311b946c3
}