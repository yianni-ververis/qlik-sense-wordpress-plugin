var config = {
    host: vars.qs_host,
    prefix: vars.qs_prefix,
    port: 443,
    isSecure: true,
    id: vars.qs_id
};
require.config( {
	baseUrl: ( config.isSecure ? "https://" : "http://" ) + config.host + (config.port ? ":" + config.port: "") + config.prefix + "resources"
} );

require( ["js/qlik"], function ( qlik ) {
    qlik.setOnError( function ( error ) {
        alert( error.message );
    } );
    var app = qlik.openApp(config.id, config);
    $('.wp-qs').each(function() {
        var obj = {
            id: $(this).data('qvid'),
            noInteraction: ($(this).data('nointeraction')) ? true : false 
        }
        app.visualization.get(obj.id).then(function (viz) {
            viz.show(obj.id, { noInteraction: obj.noInteraction })
        })
    })
} );