"use strict";
var KTCustomersList = (function () {
    var t
    return {
        init: function () {
				(t = $("#kt_table_users").DataTable({
						info: !1,
						order: [],
						columnDefs: [
							{ orderable: !5, targets: 5 },
						],
					}))            
        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTCustomersList.init();
});