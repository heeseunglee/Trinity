(function(namespace, $) {
    "use strict";

    var TakeTests = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = TakeTests.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        ;
    };

    // =========================================================================
    //
    // =========================================================================

    // =========================================================================
    namespace.TakeTests = new TakeTests;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):