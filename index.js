var config = {
    version: vars.version,
    host: vars.qs_host,
    prefix: vars.qs_prefix,
    port: 443,
    isSecure: true,
    id: vars.qs_id,
    id2: (vars.qs_id2) ? vars.qs_id2 : null
};
require.config( {
	baseUrl: ( config.isSecure ? "https://" : "http://" ) + config.host + (config.port ? ":" + config.port: "") + config.prefix + "resources"
} );

require( ["js/qlik"], function ( qlik ) {
    qlik.setOnError( function ( error ) {
        alert( error.message );
    } );
    var app = qlik.openApp(config.id, config);
    if (config.id2) {
        var app2 = qlik.openApp(config.id2, config);
    }
    $('.wp-qs').each(function() {
        var obj = {
            id: $(this).data('id'),
            qvid: $(this).data('qvid'),
            noInteraction: ($(this).data('nointeraction')) ? true : false,
            app2: ($(this).data('app2') && config.id2) ? true : false
        }
        if (obj.app2) {
            app2.visualization.get(obj.qvid).then(function (viz) {
                viz.show(obj.id, { noInteraction: obj.noInteraction })
                qlik.resize(obj.qvid);
            })
        } else {
            app.visualization.get(obj.qvid).then(function (viz) {
                viz.show(obj.id, { noInteraction: obj.noInteraction })
                qlik.resize(obj.qvid);
            })
        }
    })
    $('#qlik-sense-clear-selections').on('click', function() {
        app.clearAll();
    })
    $('#qlik-sense-clear-selections-app2').on('click', function() {
        app2.clearAll();
    })
    console.log('%cQlik Sense Wordpress Plugin: ', 'color: red', 'Version ' + config.version);
} );