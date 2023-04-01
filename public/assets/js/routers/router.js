class JsRouter
{
	constructor (dir = '')
	{
		this.dir = dir
		this.url
		this.param
		
		this.currentUrl()
		this.currentParam()
	}

	currentUrl ()
	{
		let current_url = window.location.pathname
		current_url = current_url.trim() // Trim spaces
		current_url = current_url.replace(/[^a-zA-Z0-9/]/g, '') // Remove special characters
		current_url = current_url.replace(/^\/|\/+$/g, '') // Trim backslash from url (/)
		current_url = current_url.replace(this.dir, "") // Remove directory from url

		if (current_url == '') {
			current_url = '/'
		}

		this.url = current_url
	}

	currentParam ()
	{
		let param = new Proxy(new URLSearchParams(window.location.search), 
		{
			get: (searchParams, prop) => searchParams.get(prop),
		})

		this.param = param
	}

	get (route, callback)
	{
		route = route.trim() // Trim spaces
		route = route.replace(/[^a-zA-Z0-9/]/g, '') // Remove special characters
		route = route.replace(/^\/|\/+$/g, '') // Trim backslash from url (/)

		if (route == '') {
			route = '/'
		}

		let links = document.getElementsByClassName('route-link')

		for (let L = 0; L < links.length; L++) 
		{
			links[L].addEventListener('click', (e) => 
			{
				e.preventDefault()

				let linkParams = links[L].getAttribute("data-params")
				let href = links[L].getAttribute("href")
				href = href.trim() // Trim spaces
				href = href.replace(/[^a-zA-Z0-9/]/g, '') // Remove special characters
				href = href.replace(/^\/|\/+$/g, '') // Trim backslash from url (/)

				if (linkParams == null) {
					linkParams = ''
				}

				if (href == '') {
					href = '/'
				}

				// (NOTE): 
				// You should open your files via an Webserver. 
				// You cannot change location history on the file:c//.
				window.history.pushState('', '', href+linkParams)

				this.currentParam()
				this.url = href

				if (route == this.url) {
					return callback()
				}
			})
		}

		if (route == this.url) {
			return callback()
		}
	}
}