$(document).ready(function()
{
$("p").hover(function()
{
	$(this).addClass('animated pulse');
}, function()
{
	$(this).removeClass('animated pulse');
}
);

$("p").addClass("animated tada infinite");
	
});