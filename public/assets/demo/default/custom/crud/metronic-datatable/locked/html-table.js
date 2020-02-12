var DatatableHtmlTableDemo = {
    init: function () {
        $(".m-datatable").mDatatable({
            search: {
                input: $("#generalSearch")
            },
            layout: {
                scroll: !0,
                height: 400
            },
            columns: [{
                field: "DepositPaid",
                type: "number",
                locked: {
                    left: "xl"
                }
            }, {
                field: "OrderDate",
                type: "date",
                format: "YYYY-MM-DD",
                locked: {
                    left: "xl"
                }
            }]
        })
    }
};
jQuery(document).ready(function () {
    DatatableHtmlTableDemo.init()
});