var config = {
    version: vars.version,
    host: vars.qs_host,
    prefix: vars.qs_prefix,
    port: (vars.qs_port) ? parseInt(vars.qs_port) : 443,
    isSecure: (vars.qs_secure && parseInt(vars.qs_secure) == 1) ? true : false,
    id: vars.qs_id,
    id2: (vars.qs_id2) ? vars.qs_id2 : null,
    qsapp: vars.qs_appid
};
require.config({
    baseUrl: (config.isSecure ? "https://" : "http://") + config.host + (config.port ? ":" + config.port : "") + config.prefix + "resources"
});

require(["js/qlik"], function (qlik) {
    qlik.setOnError(function (error) {
        console.log(error.message);
    });

    // use appid from custom field if available, fall back to the id from options page
    if (config.qsapp) {
        var app = qlik.openApp(config.qsapp, config);
    } else {
        var app = qlik.openApp(config.id, config);
    }

    if (config.id2) {
        var app2 = qlik.openApp(config.id2, config);
    }
    $('.wp-qs').each(function () {
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

    app.getObject('CurrentSelections', 'CurrentSelections-app1');
    if (config.id2) {
        app2.getObject('CurrentSelections', 'CurrentSelections-app2');
    }

    $('[id^=qlik-sense-clear-selections-app1]').on('click', function () {
        app.clearAll();
    })
    $('[id^=qlik-sense-clear-selections-app2]').on('click', function () {
        app2.clearAll();
    })
    console.log('%cQlik Sense Wordpress Plugin: ', 'color: red', 'Version ' + config.version);
});
