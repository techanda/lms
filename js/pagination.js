//adds event listener to the pagination limit drop down
$('select.pagination.pagination-limit').change(function(){
	var limit;
	$(this).val() === 'All' ? limit = 'all' : limit = $(this).val();
		window.location.href = removeURLParameter(window.location.href,'limit') + '&limit=' + limit;
});

//sets the pagination limit drop down to the URL limit value
window.onload = function(){
	var limit = getURLParameter('limit');
	if (limit && limit !== '') {
		//sets display pages drop down to url paramet of 'limit'
		$('select.pagination.pagination-limit #limit-' + limit).attr('selected',true);
	} else {
		//sets display pages dropdown to default (currently 24)
		$('select.pagination.pagination-limit #limit-24').attr('selected',true); //change if default limit changes in php query
	};
}