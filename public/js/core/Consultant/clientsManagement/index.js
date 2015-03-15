(function(namespace, $) {
    "use strict";

    var IndexDataTable = function() {
        // Create reference to this instance
        var o = this;
        // Initialize app when document is ready
        $(document).ready(function() {
            o.initialize();
        });

    };
    var p = IndexDataTable.prototype;

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

        // Init the demo DataTables
        this._createDataTable();
    }

    p._createDataTable = function() {
        $('.table-dataTable').dataTable({
            "sPaginationType": "full_numbers"
        });
    };

    // =========================================================================
    namespace.IndexDataTable = new IndexDataTable;
}(this.boostbox, jQuery)); // pass in (namespace, jQuery):