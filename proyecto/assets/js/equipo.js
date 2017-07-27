/*
 *	CLASE EQUIPO
 *	===============
 */
function Equipo(){
	this.equipo = {};
	this.base_url = "api/front/equipo.php";
	this.userid = '';
}
 
Equipo.prototype._getByUserId = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){
		
		console.log(_res);

	})
	.fail( function( _err ){
		console.log( _err );
	})
};



Equipo.prototype._getMemberAllForMe = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){
		self._draw(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};


Equipo.prototype._getAllForMe = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){
		self._draw(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};


Equipo.prototype._getDataById = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: (self.equipo.base_url!==null) ? self.equipo.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){
		$('#equipo_nombre').text( _res.nombre );
	})
	.fail( function( _err ){
		console.log( _err );
	})
};


Equipo.prototype._byId = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.equipo.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){
		//var res = JSON.parse(_res);
		var res = _res;
		self._drawById(res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};


Equipo.prototype._getallForSelect = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: (self.equipo.base_url!==null) ? self.equipo.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){
		self._drawSelect(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};




Equipo.prototype._update = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.equipo.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){

		//var res = JSON.parse(_res);
		setFlash(_res.msg, _res.class);
		
		if( _res.status ){

			setTimeout(function() {
				window.location='../mis-equipos';
			}, 1500);
		} else {
		}

	})
	.fail( function( _err ){
		console.log( _err );
	})
};



Equipo.prototype._save = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.equipo
	})
	.done( function( _res ){

		//var res = JSON.parse(_res);
		setFlash(_res.msg, _res.class);
		
		if( _res.status ){

			setTimeout(function() {
				window.location='./integrantes/' + _res.data;
			}, 1500);

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
Equipo.prototype._set = function( _data ){

	this.equipo = {};
	this.equipo.base_url 					= _data._base_url || null;
	this.equipo.idequipo 					= _data._idequipo || null;
	this.equipo.nombre 						= _data._nombre || null;
	this.equipo.precio_min 					= _data._precio_min || null;
	this.equipo.precio_max 					= _data._precio_max || null;
	this.equipo.intercambio_idintercambio 	= _data._intercambio_idintercambio || null;
	this.equipo.code 						= _data._code || null;
	this.equipo.articulos_max 				= _data._articulos_max || null;
	this.equipo.method 						= _data._method || null;

	if( this.equipo.method === 'all')
	{
		this._getall();
	}	
	if( this.equipo.method === 'allForMe')
	{
		this._getAllForMe();
	}
	if( this.equipo.method === 'allMemberForMe')
	{
		this._getMemberAllForMe();
	}
	if( this.equipo.method === 'allForSelect')
	{
		this._getallForSelect();
	}
	else if( this.equipo.method === 'byId')
	{
		this._byId();
	}
	else if( this.equipo.method === 'getDataById')
	{
		this._getDataById();
	}
	else if( this.equipo.method === 'getByUserId')
	{
		this._getByUserId();
	}

	else if( this.equipo.method === 'save' )
	{
		this._save();
	}
	else if( this.equipo.method === 'update')
	{
		this._update();
	}
	else if( this.equipo.method === 'delete')
	{
		this._delete()
	}

};
/*
 *	DRAW TEMPLATE HANDLEBARS
 * 	===========================
 */
Equipo.prototype._draw = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#equipo-template").html() );
		var html = template( _data );
		$("#equipo").html( html ).fadeIn();
	} else {
		$("#equipo").html('<h3 class="text-center">Aún no tienes equipos, ¡Registra uno!</h3>');
	}
};


Equipo.prototype._drawById = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#equipo-byid-template").html() );
		var html = template( _data );
		$("#equipo-byid").html( html ).fadeIn();
	} else {
		$("#equipo-byid").html('<h3 class="text-center">Aún no tienes equipos, ¡Registra uno!</h3>');
	}
};


Equipo.prototype._drawSelect = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#equipo-select-template").html() );
		var html = template( _data );
		$("#equipo-select").html( html ).fadeIn();
	} else {
		$("#equipo-select").html('<h3 class="text-center">Aún no tienes equipos</h3>');
	}
};



/*
Equipo.prototype._drawById = function( _data ){
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