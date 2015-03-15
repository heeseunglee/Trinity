(function(namespace, $) {
    "use strict";

    var Index = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = Index.prototype;

    // =========================================================================
    // INIT
    // =========================================================================

    p.initialize = function() {
        this._initPostCodify();
        this._initInputMask();
    };

    // =========================================================================
    // POSTCODIFY
    // =========================================================================

    p._initPostCodify = function() {
        $("#postcodify_search_button").postcodifyPopUp();
        $("#postcode_1").postcodifyPopUp();
        $("#postcode_2").postcodifyPopUp();
        $("#address_1").postcodifyPopUp();
    };

    // =========================================================================
    // INPUTMASK
    // =========================================================================

    p._initInputMask = function() {
        $(":input").inputmask();
    };

    // =========================================================================
    namespace.Index = new Index;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):