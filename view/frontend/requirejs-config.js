var config = {
	map: {
        '*': {
            sizechart: 'Magepow_Sizechart/js/popup'
        }
    },
    paths: {            
        'magepow/sizechart': "Magepow_Sizechart/js/popup"
    },   
    shim: {
	    'magepow/sizechart': {
	        deps: ['jquery']
	    }
  	}
}