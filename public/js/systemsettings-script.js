$(document).ready(function() {    
    $(document).on('click', '.btnClick', function(e) {
        // alert('asd');
        $(this).addClass("picked").siblings().removeClass("picked");

        var id = $(this).attr('id');

        if(id == 1)
        {
        	$('#primaryColorHidden').val('#24292e');
        	$('#secondaryColorHidden').val('#202428');
        	$('#tertiaryColorHidden').val('#4fc1e9');
        }

        else if(id == 2)
        {
        	$('#primaryColorHidden').val('#0b5e56');
        	$('#secondaryColorHidden').val('#084d46');
        	$('#tertiaryColorHidden').val('#b2e5e5');
        }

        else if(id == 3)
        {
        	$('#primaryColorHidden').val('#56384c ');
        	$('#secondaryColorHidden').val('#452d3d');
        	$('#tertiaryColorHidden').val('#ef4786');
        }

        else if(id == 4)
        {
        	$('#primaryColorHidden').val('#4e5b3c');
        	$('#secondaryColorHidden').val('#3d472f');
        	$('#tertiaryColorHidden').val('#98c61e');
        }

        else if(id == 5)
        {
        	$('#primaryColorHidden').val('#595431');
        	$('#secondaryColorHidden').val('#403c23');
        	$('#tertiaryColorHidden').val('#ffd602');
        }
    });
});