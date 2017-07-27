/*
 *	CLASE USUARIO
 *	===============
 */
function Usuario(){
	this.usuario = {};
	this.base_url = "api/front/usuario.php";
	this.userid = '';
}


Usuario.prototype._getallForSelect = function(){
	var data = {};
	var self = this;
	//AJAX REQUEST
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		dataType: 'JSON',
		data 	: self.usuario
	})
	.done( function( _res ){
		self._drawSelect(_res);
	})
	.fail( function( _err ){
		console.log( _err );
	})
};



/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================

 */
Usuario.prototype._access = function(){
	var self = this;
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){
		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){
			setTimeout(function() {
				if(res.idrol === "LIDER"){
					window.location='./';
				}else{
					window.location='./equipos-participo';
				}
			}, 1500);

		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};


/*
 * 	DELETE USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._delete = function(){
	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){
			self.usuario.method = 'getAllByIdequipo';
			self._getAllByIdequipo();
		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};


/*
 * 	ENVIAR USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._enviarInvitacion = function(){
	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};


/*
 * 	ENVIAR USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._activarUsuario = function(){
	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){
			self.usuario.method = 'getAllByIdequipo';
			self._getAllByIdequipo();
		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};


/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._getAllByIdequipo = function(){

	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: true,
		data 	: self.usuario
	})
	.done(function( _res ){
		self._drawByIdequipo(JSON.parse(_res));
	})
	.fail(function( _err ){
		console.log( _err );
	})
};



/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._emailToAllByIdequipo = function(){

	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: true,
		data 	: self.usuario
	})
	.done(function( _res ){
		
		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};


/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._finishAndEmailToAllByIdequipo = function(){

	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: true,
		data 	: self.usuario
	})
	.done(function( _res ){
		
		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};





/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._getAllByIdequipoWithArticulos = function(){

	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: true,
		data 	: self.usuario
	})
	.done(function( _res ){
		self._drawByIdequipo(JSON.parse(_res));
	})
	.fail(function( _err ){
		console.log( _err );
	})
};





/*
 * 	UPDATE USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._updateIntegrante = function(){
	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){
			self.usuario.method = 'getAllByIdequipo';
			self._getAllByIdequipo();
		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};


/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._saveIntegrante = function(){
	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){

		console.log(_res);
		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){
			self.usuario.method = 'getAllByIdequipo';
			self._getAllByIdequipo();
		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};







/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._saveLikeArticulo = function(){
	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		//setFlash(res.msg, res.class);
		
		if( res.status ){
		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};





/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._saveArticulo = function(){
	var self = this;
	$.ajax({
		url 	: (self.usuario.base_url!==null) ? self.usuario.base_url : self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){

		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){
			self.usuario.method = 'getAllByIdequipoWithArticulos';
			self._getAllByIdequipoWithArticulos();
		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};






/*
 * 	NUEVA USUARIO
 *	@params : {informacion usuario}
 *	=======================================
 */
Usuario.prototype._save = function(){
	var self = this;
	$.ajax({
		url 	: self.base_url,
		method 	: 'POST',
		async 	: false,
		data 	: self.usuario
	})
	.done(function( _res ){
		res = JSON.parse(_res);
		setFlash(res.msg, res.class);
		
		if( res.status ){

			setTimeout(function() {
				window.location='./acceso';
			}, 1500);

		} else {
		}
		
	})
	.fail(function( _err ){
		console.log( _err );
	})
};

/*
 *	SET DATA USUARIO
 *	==================
 */
Usuario.prototype._set = function( _data ){

	this.usuario = {};

	// UsuarioHasArticulo
	this.usuario.precio_max 		= _data._precio_max || null;
	this.usuario.precio_min 		= _data._precio_min || null;
	this.usuario.nombre 			= _data._nombre || null;
	this.usuario.idarticulo 		= _data._idarticulo || null;

	this.usuario.base_url 			= _data._base_url || null;
	this.usuario.idequipo 			= _data._idequipo || null;
	this.usuario.idusuario 			= _data._idusuario || null;
	this.usuario.idusuario 			= _data._idusuario || null;
	this.usuario.email 				= _data._email || null;
	this.usuario.password 			= _data._password || null;
	this.usuario.nombres 			= _data._nombres || null;
	this.usuario.apellidos 			= _data._apellidos || null;
	this.usuario.avatar 			= _data._avatar || null;
	this.usuario.rol_idrol 			= _data._rol_idrol || null;
	this.usuario.estatus 			= _data._estatus || null;
	this.usuario.participa 			= _data._participa || null;
	this.usuario.method 			= _data._method || null;

	if( this.usuario.method === 'all')
	{
		this._getall();
	}
	if( this.usuario.method === 'allForSelect')
	{
		this._getallForSelect();
	}
	if( this.usuario.method === 'getAllByIdequipo')
	{
		this._getAllByIdequipo();
	}
	if( this.usuario.method === 'emailToAllByIdequipo')
	{
		this._emailToAllByIdequipo();
	}
	if( this.usuario.method === 'finishAndEmailToAllByIdequipo')
	{
		this._finishAndEmailToAllByIdequipo();
	}
	if( this.usuario.method === 'getAllByIdequipoWithArticulos')
	{
		this._getAllByIdequipoWithArticulos();
	}
	if( this.usuario.method === 'access')
	{
		this._access();
	}
	else if( this.usuario.method === 'save' )
	{
		this._save();
	}
	else if( this.usuario.method === 'saveIntegrante' )
	{
		this._saveIntegrante();
	}
	else if( this.usuario.method === 'saveArticulo' )
	{
		this._saveArticulo();
	}
	else if( this.usuario.method === 'saveLikeArticulo' )
	{
		this._saveLikeArticulo();
	}
	else if( this.usuario.method === 'updateIntegrante' )
	{
		this._updateIntegrante();
	}
	else if( this.usuario.method === 'edit')
	{
		this._update();
	}
	else if( this.usuario.method === 'delete')
	{
		this._delete()
	}
	else if( this.usuario.method === 'enviarInvitacion')
	{
		this._enviarInvitacion()
	}
	else if( this.usuario.method === 'activarUsuario')
	{
		this._activarUsuario()
	}



};
/*
 *	DRAW TEMPLATE HANDLEBARS
 * 	===========================
 */
Usuario.prototype._drawByIdequipo = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#integrantes-template").html() );
		var html = template( _data );
		$("#integrantes").html( html ).fadeIn();
	} else {
		$("#integrantes").html('<h3 class="text-center">Aún no tienes integrantes, ¡Registra uno!</h3>');
	}
};



Usuario.prototype._drawSelect = function( _data ){
	if ( _data.length > 0){
		var template = Handlebars.compile( $("#usuario-select-template").html() );
		var html = template( _data );
		$("#usuario-select").html( html ).fadeIn();
	} else {
		$("#usuario-select").html('<h3 class="text-center">Aún no tienes usuarios, ¡Registra uno!</h3>');
	}
};



/*
Usuario.prototype._drawById = function( _data ){
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