/**
 * Created by finallee on 15. 2. 6..
 */
(function(namespace, $) {
    "use strict";

    var Index = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            $(":input").inputmask();
            o.initialize();
        });

    };
    var p = Index.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        ;
    };

    // =========================================================================
    namespace.Index = new Index;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):