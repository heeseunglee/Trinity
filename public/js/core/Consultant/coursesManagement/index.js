/**
 * Created by finallee on 15. 2. 11..
 */
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
        this._initDataTables();
    };

    // =========================================================================
    // DATATABLES
    // =========================================================================

    p._initDataTables = function() {
        if (!$.isFunction($.fn.dataTable)) {
            return;
        }

        var o = this;

        this._createDataTable1();
    }

    p._createDataTable1 = function() {
        $('.table-dataTable').dataTable({
            "sPaginationType": "full_numbers"
        });
    };

    // =========================================================================
    namespace.Index = new Index;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):
