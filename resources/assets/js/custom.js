let clicked = false

$('.like-btn-clickable').click((e) => {
	e.preventDefault()
	console.log('Test')
})

$('#searchButton').click(() => {
	clicked = !clicked
	$('.search-container').css('width', clicked ? '270px' : '60px')
	$('#searchButton').css('width', clicked ? '1em' : '2em')
	$('#searchInput').css('border', clicked ? '2px solid #2ebaae' : '1px solid #ced4da')
})

$('.submenu-expansion').click(() => {
	$('.sidenav').css('transform', 'translateX(0)')
	$('.fader').css({'opacity': '1', 'z-index' : '10'})
})

$('.fader').click(() => {
	$('.sidenav').css('transform', 'translateX(28em)')
	$('.fader').css({'opacity': '0', 'z-index' : '-1'})
})

function likeEventActivate(e){
	console.log('called')
	let article_id = e.target.dataset.articleId
	$.ajax({
		method: 'Post',
		url: '/likes',
		dataType: 'json',
		data: {
			id: article_id
		}
	}).catch((e) => { console.log(e)})
}

window.sendLike = likeEventActivate