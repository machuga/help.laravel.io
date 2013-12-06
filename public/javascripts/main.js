requirejs.config({
    baseUrl: "/javascripts",
    paths: {
      jquery:    "jquery.min",
      highlight: "highlight.min"
    },
    shim: {
        highlight: {
            export: "hljs",
            deps: ['jquery'],
            init: function() {
                hljs.initHighlighting();
            }
        }
    }
});
