<div id="myProduct" class="modal fade" role="dialog" aria-labelledby="contohModalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Choose Product</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body table-responsive p-0" style="height: 425px;">
                                <input type="text" id="key" hidden>
                                <table class="table table-head-fixed table-sm text-nowrap" id="tableGetProduct">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Product Code</th>
                                            <th>Product Name</th>
                                            <th>UOM</th>
                                            <th style="display: none;"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var isBodyClicked = false;
    function KeyFunction(key) {
        $("#key").val(key);
        if (isBodyClicked === false) {

            ShowLoading();

            $("#tableGetProduct").dataTable().fnDestroy();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var dataShow = [];
            $.ajax({
                type: 'GET',
                url: '{!! route("getProduct") !!}',
                success: function(data) {
                    for (var i = 0; i < Object.keys(data).length; i++) {
                        var no = i + 1;
                        dataShow.push([
                            '<tbody><tr><td>' + no + '</td>',
                            '<td>' + data[i]['sys_ID'] + '</td>',
                            '<td>' + data[i]['name'] + '</td>',
                            '<td>' + data[i]['quantityUnitName'] + '</td>',
                            '<span style="display:none;"><td">' + data[i]['quantityUnit_RefID'] + '</td></span></tr></tbody>'
                        ]);
                    }

                    HideLoading();


                    $('#tableGetProduct').DataTable({
                        data: dataShow,
                        deferRender: true,
                        scrollCollapse: true,
                        scroller: true
                    });
                }
            });
        }
        isBodyClicked = true;
    }
</script>

<script>
    $('#tableGetProduct tbody').on('click', 'tr', function() {

        $("#myProduct").modal('toggle');

        var row = $(this).closest("tr");
        var sys_id = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();
        var uom = row.find("td:nth-child(4)").text();
        var budget_qty_id = row.find("td:nth-child(5)").text();
        var key = $("#key").val();
        
        $("#product_id" + key).val(sys_id);
        $("#product_name" + key).val(name);
        $("#product_name" + key).html(name);
        $("#putUom" + key).val(uom);

        $("#budget_qty_id" + key).val(budget_qty_id);

        $("#qty_req" + key).prop("disabled", false);
        $("#price_req" + key).prop("disabled", false);
        $("#remark_req" + key).prop("disabled", false);

        $("#allowance_req" + key).prop("disabled", false);
        $("#accomodation_req" + key).prop("disabled", false);
        $("#other_req" + key).prop("disabled", false);
        $("#note_req" + key).prop("disabled", false);


    });
</script>