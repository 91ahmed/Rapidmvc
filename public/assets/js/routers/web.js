const routes = new JsRouter('Rapidmvc')

routes.get('/home', () =>
{
	document.getElementById('demo').innerHTML = 'Home '+routes.param.page
})

routes.get('/about', () =>
{
	document.getElementById('demo').innerHTML = 'About '+routes.param.page
})

routes.get('/contact', () =>
{
	document.getElementById('demo').innerHTML = 'Contact '+routes.param.page
})