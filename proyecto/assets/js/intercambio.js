/*
 *	CLASE EQUIPO
 *	===============
 */
function Intercambio(){
	this.intercambio = {};
	this.base_url = "api/front/intercambio.php";
	this.userid = '';
}


Intercambio.prototype._getByUserId = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.intercambio
	})
	.done( function( _res ){
		
		console.log(_res);
		/*
		var res = JSON.parse( _res );
		console.log(res);
		$('#intercambio_idintercambio').val(res.idintercambio);
		*/

	})
	.fail( function( _err ){
		console.log( _err );
	})
};

Intercambio.prototype._getallForSelect = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: (self.intercambio.base_url!==null) ? self.intercambio.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.intercambio
	})
	.done( function( _res ){
		self._drawSelect(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};


Intercambio.prototype._save = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.intercambio
	})
	.done( function( _res ){

		//var res = JSON.parse(_res);
		setFlash(_res.msg, _res.class);
		
		if( _res.status ){

			setTimeout(function() {
				window.location='./equipo';
			}, 3000);

		} else {
		}

	})
	.fail( function( _err ){
		console.log( _err );
	})
};



/*
 *	SET DATA EQUIPO
 *	==================
 */
Intercambio.prototype._set = function( _data ){

	this.intercambio = {};
	this.intercambio.base_url 			= _data._base_url || null;
	this.intercambio.nombre 			= _data._nombre || null;
	this.intercambio.fecha_ini 			= _data._fecha_ini || null;
	this.intercambio.fecha_fin 			= _data._fecha_fin || null;
	this.intercambio.usuario_idusuario 	= _data._usuario_idusuario || null;
	this.intercambio.method 			= _data._method || null;

	if( this.intercambio.method === 'all')
	{
		this._getall();
	}
	if( this.intercambio.method === 'allForSelect')
	{
		this._getallForSelect();
	}
	else if( this.intercambio.method === 'byId')
	{
		this._byId();
	}

	else if( this.intercambio.method === 'getByUserId')
	{
		this._getByUserId();
	}

	else if( this.intercambio.method === 'save' )
	{
		this._save();
	}
	else if( this.intercambio.method === 'edit')
	{
		this._update();
	}
	else if( this.intercambio.method === 'delete')
	{
		this._delete()
	}

};
/*
 *	DRAW TEMPLATE HANDLEBARS
 * 	===========================

Intercambio.prototype._draw = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#intercambio-template").html() );
		var html = template( _data );
		$("#intercambio").html( html ).fadeIn();
	} else {
		$("#intercambio").html('<h3 class="text-center">Aún no tienes intercambios, ¡Registra uno!</h3>');
	}
};
 */


Intercambio.prototype._drawSelect = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#intercambio-select-template").html() );
		var html = template( _data );
		$("#intercambio-select").html( html ).fadeIn();
	} else {
		$("#intercambio-select").html('<h3 class="text-center">Aún no tienes intercambios</h3>');
	}
};



/*
Intercambio.prototype._drawById = function( _data ){
	var self = this;
	$("#modal-launcher").load('views/user/modals/m-info-focus.php?token=' + Math.random(), function(e){
		$("#modal-info-focus").modal({
			show : true,
			backdrop : 'static',
			keyboard : false
		});
		$("#txt__Description").val( _data.texto );
		$("#txt__user").val( self.userid );
		$("#txt__post").val( _data.Post_idPost );
		$("#txt__id").val( _data.id );
	})
}

 */