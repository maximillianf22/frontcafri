require.config({
     baseUrl: UrlHost_+'/components/',
     paths: {
        'jquery': 'bootstrap/jquery.min',
        'popper': 'bootstrap/popper.min',
        'bootstrap': 'bootstrap/bootstrap.min',
        'core': 'core',
     }
 });
 
 /*
 requirejs.onResourceLoad = function (context, map, depArray) {
     var e = document.getElementById('loaded-scripts');
     for (var i in context.config.paths) {
         e.innerHTML = e.innerHTML + context.config.paths[i] + "<br />";
     }
 }
 */

require(['jquery','popper','bootstrap','core'], function($, popper, bootstrap) {
    // console.log(jq);
});
