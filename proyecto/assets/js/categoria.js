/*
 *	CLASE EQUIPO
 *	===============
 */
function Categoria(){
	this.categoria = {};
	this.base_url = "api/front/categoria.php";
	this.userid = '';
}

/*
 *	TODAS LAS EQUIPO POR USUARIO
 *	@params : {id_usuario logueado || usuario visitado}
 *	=====================================================

Categoria.prototype._getall = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.categoria
	})
	.done( function( _res ){
		if( _res.length <= 5 )

		self._draw(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};
*/

Categoria.prototype._getallForSelect = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.categoria
	})
	.done( function( _res ){
		self._drawSelect(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};

/*
 *	EQUIPO POR ID
 * 	@params : {id_aportacion}
 *	==========================

Categoria.prototype._byId = function(){
	var self = this;
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		async 	: false,
		dataType: 'JSON',
		data 	: self.categoria
	})
	.done(function( _res ){
		console.log( _res );
		self._drawById(_res);
	})
	.fail(function( _err ){
		console.log( _err );
	})
}; */
/*
 * 	NUEVA EQUIPO
 *	@params : {informacion categoria}
 *	=======================================
*/

Categoria.prototype._save = function(){
	var self = this;
	var user_id = self.categoria.user_id;
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.categoria
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){
		} else {
		}
	})
	.fail(function( _err ){
		console.log( _err );
	})
}; 

/*
 *	ELIMINAR EQUIPO
 *	@param : id_aportacion
 *	=========================

Categoria.prototype._delete = function(){
	var self = this;
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		async 	: false,
		dataType: 'JSON',
		data 	: self.categoria
	})
	.done(function( _res ){
		console.log( _res );
	})
	.fail(function( _err ){
		console.log( _err );
	})
}; */
/*
 *	SET DATA EQUIPO
 *	==================
 */

Categoria.prototype._set = function( _data ){

	this.categoria = {};
	this.categoria.nombre 		= _data._nombre || null;
	this.categoria.idcategoria 	= _data._idcategoria || null;
	this.categoria.method 		= _data._method || null;

	if( this.categoria.method === 'all')
	{
		this._getall();
	}
	if( this.categoria.method === 'allForSelect')
	{
		this._getallForSelect();
	}
	else if( this.categoria.method === 'byId')
	{
		this._byId();
	}
	else if( this.categoria.method === 'save' )
	{
		this._save();
	}
	else if( this.categoria.method === 'edit')
	{
		this._update();
	}
	else if( this.categoria.method === 'delete')
	{
		this._delete()
	}

}

/*
 *	DRAW TEMPLATE HANDLEBARS
 * 	===========================

Categoria.prototype._draw = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#categoria-template").html() );
		var html = template( _data );
		$("#categoria").html( html ).fadeIn();
	} else {
		$("#categoria").html('<h3 class="text-center">Aún no tienes categorias, ¡Registra uno!</h3>');
	}
};
*/

Categoria.prototype._drawSelect = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#categoria-select-template").html() );
		var html = template( _data );
		$("#categoria-select").html( html ).fadeIn();
	} else {
		$("#categoria-select").html('<h3 class="text-center">Aún no tienes categorias</h3>');
	}
}

/*
Categoria.prototype._drawById = function( _data ){
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
