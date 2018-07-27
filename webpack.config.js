var Encore = require('@symfony/webpack-encore');

Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    // the public path you will use in Symfony's asset() function - e.g. asset('build/some_file.js')
    .setManifestKeyPrefix('build/')

    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())

    // the following line enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())

    // uncomment to define the assets of the project
    .addEntry('js/admin/admin', './assets/js/admin.js')
    .addEntry('js/bootstrap/bootstrap', './assets/bootstrap/bootstrap.js')

    .addStyleEntry('css/admin/admin', './assets/css/admin.css')
    .addStyleEntry('css/carte/admin', './assets/css/carte.css')
    .addStyleEntry('css/menu/admin', './assets/css/menu.css')
    .addStyleEntry('css/barnav/barnav', './assets/css/barnav.css')
    
    .addStyleEntry('css/bootstrap/bootstrap', './assets/bootstrap/bootstrap.css')

    // uncomment if you use TypeScript
    //.enableTypeScriptLoader()

    // uncomment if you use Sass/SCSS files
    //.enableSassLoader()

    // uncomment for legacy applications that require $/jQuery as a global variable
    //.autoProvidejQuery()


;

module.exports = Encore.getWebpackConfig();
