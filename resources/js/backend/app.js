const M = require('materialize-css');

$(document).ready(() => {
	app.init();
});


const app = {

	init() {
		M.AutoInit();
		var instance = $('#modal').modal('open');
		instance.open();
	},

}