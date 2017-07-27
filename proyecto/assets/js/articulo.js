/*
 *	CLASE EQUIPO
 *	===============
 */
function Articulo(){
	this.articulo = {};
	this.base_url = "api/front/articulo.php";
	this.userid = '';
}



Articulo.prototype._saveFromEquipo = function(){
	var data = {};
	var self = this;
	self.articulo.method = "save";

	//AJAX REQUEST
	$.ajax({
		url 	: (self.articulo.base_url!==null) ? self.articulo.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.articulo
	})
	.done( function( _res ){
		setFlash(_res.msg, _res.class);

		// Llena lista de articulos
		var articulo = new Articulo();
		var params = {
		'_precio_min' : self.articulo.old_precio_min,
		'_precio_max' : self.articulo.old_precio_max,
		'_method'     : 'allForRadios'
		}
		articulo._set(params);

	})
	.fail( function( _err ){
		console.log( _err );
	})
};

Articulo.prototype._save = function(){
	var data = {};
	var self = this;

	//AJAX REQUEST
	$.ajax({
		url 	: (self.articulo.base_url!==null) ? self.articulo.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.articulo
	})
	.done( function( _res ){
		console.log(_res);
		setFlash(_res.msg, _res.class);

	})
	.fail( function( _err ){
		console.log( _err );
	})
};


Articulo.prototype._saveUsuarioHasArticulo = function(){
	var self = this;

	console.log(self.articulo.idequipo)

	//AJAX REQUEST
	$.ajax({
		url 	: (self.articulo.base_url!==null) ? self.articulo.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.articulo
	})
	.done( function( _res ){

		setFlash(_res.msg, _res.class);
		
		if( _res.status ){

            // Llena lista de integrantes
            var usuario = new Usuario();
            var params = {
               '_base_url'   : '../api/front/usuario.php',
               '_idequipo'   : self.articulo.idequipo,
               '_method'     : 'getAllByIdequipoWithArticulos'
            }
            usuario._set(params);


		} else {
		}


	})
	.fail( function( _err ){
		console.log( _err );
	})
};



Articulo.prototype._allForRadios = function(){
	var data = {};
	var self = this;

	//AJAX REQUEST
	$.ajax({
		url 	: (self.articulo.base_url!==null) ? self.articulo.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.articulo
	})
	.done( function( _res ){
		self._drawRadios(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};




Articulo.prototype._getallForSelect = function(){
	var data = {};
	var self = this;

	//AJAX REQUEST
	$.ajax({
		url 	: (self.articulo.base_url!==null) ? self.articulo.base_url : self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.articulo
	})
	.done( function( _res ){
		self._drawSelect(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};


/*
 * 	DELETE EQUIPO
 *	@params : {informacion articulo}
 *	=======================================
 */
Articulo.prototype._delete = function(){
	var self = this;
	$.ajax({
		url 	: (self.articulo.base_url!==null) ? self.articulo.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.articulo
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){

            // Llena lista de integrantes
            var usuario = new Usuario();
            var params = {
               '_base_url'   : '../api/front/usuario.php',
               '_idequipo'   : self.articulo.idequipo,
               '_method'     : 'getAllByIdequipoWithArticulos'
            }
            usuario._set(params);


		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};




/*
 *	SET DATA EQUIPO
 *	==================
 */
Articulo.prototype._set = function( _data ){

	this.articulo = {};
	this.articulo.idusuario 					= _data._idusuario || null;
	this.articulo.idequipo 					    = _data._idequipo || null;

	
	this.articulo.old_precio_min 					= _data._old_precio_min || null;
	this.articulo.old_precio_max 					= _data._old_precio_max || null;

	this.articulo.base_url 						= _data._base_url || null;
	this.articulo.idarticulo 					= _data._idarticulo || null;
	this.articulo.nombre 						= _data._nombre || null;
	this.articulo.precio_min 					= _data._precio_min || null;
	this.articulo.precio_max 					= _data._precio_max || null;
	this.articulo.method 						= _data._method || null;

	if( this.articulo.method === 'all')
	{
		this._getall();
	}	
	if( this.articulo.method === 'allForSelect')
	{
		this._getallForSelect();
	}
	if( this.articulo.method === 'allForRadios')
	{
		this._allForRadios();
	}
	if( this.articulo.method === 'saveUsuarioHasArticulo')
	{
		this._saveUsuarioHasArticulo();
	}
	else if( this.articulo.method === 'byId')
	{
		this._byId();
	}
	else if( this.articulo.method === 'save' )
	{
		this._save();
	}
	else if( this.articulo.method === 'saveFromEquipo' )
	{
		this._saveFromEquipo();
	}
	else if( this.articulo.method === 'update')
	{
		this._update();
	}
	else if( this.articulo.method === 'delete')
	{
		this._delete()
	}

};



/*
 *	DRAW TEMPLATE HANDLEBARS
 * 	===========================
 */
Articulo.prototype._drawSelect = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#articulo-select-template").html() );
		var html = template( _data );
		$("#articulo-select").html( html ).fadeIn();
	} else {
		$("#articulo-select").html('<h3 class="text-center">No tienes articulos dentro del rango de precios</h3>');
	}
};


Articulo.prototype._drawRadios = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#articulos-template").html() );
		var html = template( _data );
		$("#articulos").html( html ).fadeIn();
	} else {
		$("#articulos").html('<h3 class="text-center">No tienes articulos dentro del rango de precios</h3>');
	}
};

