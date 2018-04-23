function forceSort(sort, item)
{
    $(sort).sortable({
        revert: true,
        stop: function(event, ui) {
            setIds(item);
        }
    });
    function setIds(item){
        $(item).each(function(k){
            $(this).html(k + 1);
        });
    }
    setIds(item);
}