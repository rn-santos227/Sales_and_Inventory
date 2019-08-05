var thIndex = 0,
    order = 'asc',
    curThIndex = null;


$(function(){
  $('table thead tr th').click(function(){
    thIndex = $(this).index();
      curThIndex = thIndex;
      sorting = [];
      tbodyHtml = null;
      $('table tbody tr').each(function(){
        sorting.push($(this).children('td').eq(curThIndex).html() + ', ' + $(this).index());
      });
      if(order == 'asc')
      {
        sorting = sorting.sort();
        sortIt(); 
        order = 'dsc';
      }
      else
      {
        sorting = sorting.reverse();
        sortIt(); 
        order = 'asc';
      }    
  });
})

function sortIt(){
  for(var sortingIndex = 0; sortingIndex < sorting.length; sortingIndex++){
    rowId = parseInt(sorting[sortingIndex].split(', ')[1]);
    tbodyHtml = tbodyHtml + $('table tbody tr').eq(rowId)[0].outerHTML;
  }
  $('table tbody').html(tbodyHtml);
}