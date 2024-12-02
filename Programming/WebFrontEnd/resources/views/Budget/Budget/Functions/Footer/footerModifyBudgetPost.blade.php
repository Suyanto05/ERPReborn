<!-- DISABLE SUB BUDGET CODE KETIKA BUDGET CODE BELUM DIPILIH -->
<script>
    $("#project_code_popup").prop("disabled", true);
    $("#site_code_popup").prop("disabled", true);
    $("#currency_popup").prop("disabled", true);
</script>

<!-- BUDGET CODE -->
<script>
    $('#tableGetProject tbody').on('click', 'tr', function() {

        $("#myProject").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_budget' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#project_id").val(sys_id);
        $("#project_code").val(code);
        $("#project_name").val(name);
        $("#site_code").prop("disabled", false);
        $("#site_code_popup").prop("disabled", false);
        $("#site_id").val("");
        $("#site_code").val("");
        $("#site_name").val("");

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        var keys = 0;
        $.ajax({
            type: 'GET',
            url: '{!! route("getSite") !!}?project_code=' + sys_id,
            success: function(data) {

                var no = 1;
                var t = $('#tableGetSite').DataTable();
                t.clear();
                $.each(data, function(key, val) {
                    keys += 1;
                    t.row.add([
                        '<tbody><tr><input id="sys_id_site' + keys + '" value="' + val.Sys_ID + '" type="hidden"><td>' + no++ + '</td>',
                        '<td>' + val.Code + '</td>',
                        '<td>' + val.Name + '</td></tr></tbody>'
                    ]).draw();
                });
            }
        });
    });
</script>

<!-- SITE CODE -->
<script>
    $('#tableGetSite tbody').on('click', 'tr', function() {
        $("#currency_popup").prop("disabled", false);
        $("#mySiteCode").modal('toggle');

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_site' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        $("#site_id").val(sys_id);
        $("#site_code").val(code);
        $("#site_name").val(name);
    });
</script>

<!-- CURRENCY -->
<script>
    $('#tableGetCurrency tbody').on('click', 'tr', function () {
        $("#myCurrency").modal('toggle');

        const siteId = $('#site_id').val();
        const budgetTableBody = document.querySelector('#budgetTable tbody');
        
        while (budgetTableBody.firstChild) {
            budgetTableBody.removeChild(budgetTableBody.firstChild);
        }

        var row = $(this).closest("tr");
        var id = row.find("td:nth-child(1)").text();
        var sys_id = $('#sys_id_currency' + id).val();
        var code = row.find("td:nth-child(2)").text();
        var name = row.find("td:nth-child(3)").text();

        if (code != "USD" && code != "IDR" && code != "EUR") {
            $("#currency_id").val("");
            $("#currency_name").val("");
            $("#currency_symbol").val("");
            $("#exchange_rate").val("");
            
            Swal.fire("Error", "Please Call Accounting Staffs to Input Current Exchange Rate. Thank You.", "error");
        } else {
            if (code == "USD") {
                $("#exchange_rate").val(16000);
            } else if (code == "EUR") {
                $("#exchange_rate").val(17205);
            } else if (code == "IDR") {
                $("#exchange_rate").val("");
            }

            $("#currency_id").val(sys_id);
            $("#currency_name").val(name);
            $("#currency_symbol").val(code);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: 'GET',
                url: '{!! route("getBudget") !!}?site_code=' + siteId,
                success: function(data) {
                    var no = 1;
                    var applied = 0;
                    var status = "";
                    var statusDisplay = [];
                    var statusJustifyContentCenter = [];
                    var statusDisplay2 = [];
                    var statusJustifyContentCenter2 = [];
                    var statusForm = [];
                    
                    if (data.message == "Invalid SQL Syntax") {
                        var html = 
                            '<tr>' +
                                '<td class="container-tbody-tr-budget" colspan="14" style="color: red; font-style: italic;">' + 
                                    'No Data Available' +
                                '</td>' +
                            '</tr>';

                        $('table#budgetTable tbody').append(html);
                    } else {
                        if (code == "USD" || code == "EUR") {
                            const dummy = [
                                {
                                    quantityAbsorptionRatio: 1.8,
                                    quantity: 50,
                                    productName: "Unspecified Product",
                                    quantityRemaining: 0,
                                    product_RefID: null,
                                    priceBaseCurrencyValue: 29.99,
                                    priceBaseCurrencyISOCode: code,
                                    balancedBudget: 499.50
                                },
                                {
                                    quantityAbsorptionRatio: 2.2,
                                    quantity: 20,
                                    productName: "Unspecified Product",
                                    quantityRemaining: 0,
                                    product_RefID: null,
                                    priceBaseCurrencyValue: 120.50,
                                    priceBaseCurrencyISOCode: code,
                                    balancedBudget: 410.00
                                },
                                {
                                    quantityAbsorptionRatio: 1.5,
                                    quantity: 100,
                                    productName: "Unspecified Product",
                                    quantityRemaining: 10,
                                    product_RefID: null,
                                    priceBaseCurrencyValue: 50.00,
                                    priceBaseCurrencyISOCode: code,
                                    balancedBudget: 1000.00
                                },
                                {
                                    quantityAbsorptionRatio: 2.8,
                                    quantity: 100,
                                    productName: "Wiring, Testing dan Commisioning Peralatan Telekomunikasi PLC Teleproteksi",
                                    quantityRemaining: 0,
                                    product_RefID: 88000000010609,
                                    priceBaseCurrencyValue: 30.99,
                                    priceBaseCurrencyISOCode: code,
                                    balancedBudget: 599.50
                                },
                                {
                                    quantityAbsorptionRatio: 1.2,
                                    quantity: 10,
                                    productName: "150kV Single suspension string set for 2xAAAC 630Qmm, 120kN, w/o insulator, envelope type",
                                    quantityRemaining: 0,
                                    product_RefID: 88000000010968,
                                    priceBaseCurrencyValue: 110.50,
                                    priceBaseCurrencyISOCode: code,
                                    balancedBudget: 400.00
                                },
                                {
                                    quantityAbsorptionRatio: 3.5,
                                    quantity: 200,
                                    productName: "Jumper 5 m Din Male - Din Right Angels",
                                    quantityRemaining: 20,
                                    product_RefID: 88000000005886,
                                    priceBaseCurrencyValue: 100.00,
                                    priceBaseCurrencyISOCode: code,
                                    balancedBudget: 10000.00
                                },
                            ];

                            $.each(dummy, function(key, val2) {
                                var used = val2.quantityAbsorptionRatio * 100;
                                var product_name_id = 'product_name' + key;

                                if (used == "0.00" && val2.quantity == "0.00") {
                                    var applied = 0;
                                } else {
                                    var applied = Math.round(used);
                                }

                                if (applied >= 100) {
                                    var status = "disabled";
                                }

                                if (val2.productName == "Unspecified Product") {
                                    statusDisplay[key] = "flex";
                                    statusJustifyContentCenter[key] = "center";
                                    statusDisplay2[key] = "none";
                                    statusForm[key] = "disabled";
                                    balance_qty = numberFormatPHPCustom(val2.quantityRemaining, 2);
                                } else {
                                    statusDisplay[key] = "none";
                                    statusJustifyContentCenter2[key] = "center";
                                    statusDisplay2[key] = "";
                                    statusForm[key] = "";
                                    balance_qty = numberFormatPHPCustom(val2.quantityRemaining, 2);
                                }

                                var html = 
                                    '<tr>' +
                                        '<td class="container-tbody-tr-budget" style="justify-content: center; display:' + statusDisplay[key] + '";">' + 
                                            '<div class="input-group" style="max-width: 140px !important;">' + 
                                                '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" readonly>' +
                                                '<div>' +
                                                    '<span style="border-radius:0;" class="input-group-text form-control">' +
                                                        '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                                    '</span>' +
                                                '</div>' +
                                            '</div>' +
                                        '</td>' +

                                        '<td class="container-tbody-tr-budget" style="text-align: center !important; display:' + statusDisplay2[key] + '";">' + val2.product_RefID + '</td>' +
                                        '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' + 
                                            '<span id="' + product_name_id + '">' + val2.productName + '</span>' +
                                        '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.quantity, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + balance_qty + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + val2.priceBaseCurrencyISOCode + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(1000, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.quantity * val2.priceBaseCurrencyValue, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center" data-toggle="tooltip" data-placement="top" title="Pesan"> <input style="border-radius:0; width: 55px !important;" class="form-control number-only" autocomplete="off" id="modify_budget_details" name="modify_budget_details"> </div>' + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-without-negative" autocomplete="off" id="price_budget_details" name="price_budget_details"> </div>' + '</td>' +
                                        '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-only" autocomplete="off" id="total_budget_details" name="total_budget_details" disabled> </div>' + '</td>' +
                                    '</tr>';

                                $('table#budgetTable tbody').append(html);
                            });
                        } else {
                            $.each(data, function(key, val2) {
                                var used = val2.quantityAbsorptionRatio * 100;
                                var product_name_id = 'product_name' + key;

                                if (used == "0.00" && val2.quantity == "0.00") {
                                    var applied = 0;
                                } else {
                                    var applied = Math.round(used);
                                }

                                if (applied >= 100) {
                                    var status = "disabled";
                                }

                                if (val2.productName == "Unspecified Product") {
                                    statusDisplay[key] = "flex";
                                    statusJustifyContentCenter[key] = "center";
                                    statusDisplay2[key] = "none";
                                    statusForm[key] = "disabled";
                                    balance_qty = "-";
                                } else {
                                    statusDisplay[key] = "none";
                                    statusJustifyContentCenter2[key] = "center";
                                    statusDisplay2[key] = "";
                                    statusForm[key] = "";
                                    balance_qty = numberFormatPHPCustom(val2.quantityRemaining, 2);
                                }

                                var html = 
                                    '<tr>' +
                                        '<td class="container-tbody-tr-budget" style="justify-content: center; display:' + statusDisplay[key] + '";">' + 
                                            '<div class="input-group" style="max-width: 140px !important;">' + 
                                                '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" readonly>' +
                                                '<div>' +
                                                    '<span style="border-radius:0;" class="input-group-text form-control">' +
                                                        '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                                    '</span>' +
                                                '</div>' +
                                            '</div>' +
                                        '</td>' +

                                        '<td class="container-tbody-tr-budget" style="text-align: center !important; display:' + statusDisplay2[key] + '";">' + val2.product_RefID + '</td>' +
                                        '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' + 
                                            '<span id="' + product_name_id + '">' + val2.productName + '</span>' +
                                        '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.quantity, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + balance_qty + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.priceBaseCurrencyValue, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + val2.priceBaseCurrencyISOCode + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(50000, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.quantity * val2.priceBaseCurrencyValue, 2) + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center" data-toggle="tooltip" data-placement="top" title="Pesan"> <input style="border-radius:0; width: 55px !important;" class="form-control number-only" autocomplete="off" id="modify_budget_details" name="modify_budget_details"> </div>' + '</td>' +
                                        '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-without-negative" autocomplete="off" id="price_budget_details" name="price_budget_details"> </div>' + '</td>' +
                                        '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-only" autocomplete="off" id="total_budget_details" name="total_budget_details" disabled> </div>' + '</td>' +
                                    '</tr>';

                                $('table#budgetTable tbody').append(html);
                            });
                        }
                    }
                }
            });
        }
    })
</script>

<!-- FUNCTION INPUT NUMBER ONLY OR WITHOUT NEGATIVE -->
<script>
    $(document).on('input', '.number-only', function() {
        allowNumbersOnly(this);
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });
</script>

<!-- MENAMPILKAN DATA CURRENCY -->
<script>
    var no = 1;
    var applied = 0;
    var status = "";
    var statusDisplay = [];
    var statusJustifyContentCenter = [];
    var statusDisplay2 = [];
    var statusJustifyContentCenter2 = [];
    var statusForm = [];

    const budgetDataElement = document.getElementById('budgetDetailsData');
    const budgetArrayData = JSON.parse(budgetDataElement.value);

    if (budgetArrayData.length > 0) {
        $.each(budgetArrayData, function(key, val2) {
            var used = val2.quantityAbsorptionRatio * 100;

            if (used == "0.00" && val2.quantity == "0.00") {
                var applied = 0;
            } else {
                var applied = Math.round(used);
            }

            if (applied >= 100) {
                var status = "disabled";
            }

            if (val2.productName == "Unspecified Product") {
                statusDisplay[key] = "flex";
                statusJustifyContentCenter[key] = "center";
                statusDisplay2[key] = "none";
                statusForm[key] = "disabled";
                balance_qty = "-";
            } else {
                statusDisplay[key] = "none";
                statusJustifyContentCenter2[key] = "center";
                statusDisplay2[key] = "";
                statusForm[key] = "";
                balance_qty = numberFormatPHPCustom(val2.qtyAvail, 2);
            }

            var html = 
                '<tr>' +
                    '<td class="container-tbody-tr-budget" style="justify-content: center; display:' + statusDisplay[key] + '";">' + 
                        '<div class="input-group" style="max-width: 140px !important;">' + 
                            '<input id="product_id' + key + '" style="border-radius:0;" class="form-control" name="product_id_show" value="' + val2.productId + '" readonly>' +
                            '<div>' +
                                '<span style="border-radius:0;" class="input-group-text form-control">' +
                                    '<a href="#" id="product_popup" data-toggle="modal" data-target="#myProduct" class="myProduct" onclick="KeyFunction(' + key + ')"><img src="{{ asset("AdminLTE-master/dist/img/box.png") }}" width="13" alt=""></a>' +
                                '</span>' +
                            '</div>' +
                        '</div>' +
                    '</td>' +

                    '<td class="container-tbody-tr-budget" style="text-align: center !important; display:' + statusDisplay2[key] + '";">' + val2.productId + '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' + val2.productName + '</td>' +
                    '<td class="container-tbody-tr-budget">' + numberFormatPHPCustom(val2.qtyBudget, 2) + '</td>' +
                    '<td class="container-tbody-tr-budget">' + balance_qty + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.price + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.currency + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.balanceBudget + '</td>' +
                    '<td class="container-tbody-tr-budget">' + val2.totalBudget + '</td>' +
                    '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center" data-toggle="tooltip" data-placement="top" title="Pesan"> <input style="border-radius:0; width: 55px !important;" class="form-control number-only" autocomplete="off" id="modify_budget_details" name="modify_budget_details" value="' + val2.modifyInput +'"> </div>' + '</td>' +
                    '<td class="container-tbody-tr-budget">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-without-negative" autocomplete="off" id="price_budget_details" name="price_budget_details" value="' + val2.priceInput +'"> </div>' + '</td>' +
                    '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + '<div class="d-flex justify-content-center"> <input style="border-radius:0; width: 100px !important;" class="form-control number-only" autocomplete="off" id="total_budget_details" name="total_budget_details" value="' + val2.totalInput +'" disabled> </div>' + '</td>' +
                '</tr>';

            $('table#budgetTable tbody').append(html);
        });
    }
</script>

<!-- FUNCTION INPUT NUMBER ONLY OR WITHOUT NEGATIVE -->
<script>
    $(document).on('input', '.number-only', function() {
        allowNumbersOnly(this);
    });

    $(document).on('input', '.number-without-negative', function() {
        allowNumbersWithoutNegative(this);
    });
</script>

<!-- FORM ADD NEW ITEM -->
<script>
    const addNewItemBtn = document.getElementById('addNewItemBtn');
    const newItemForm = document.getElementById('newItemForm');
    const newItemFormTwo = document.getElementById('newItemFormTwo');
    const newItemFormThree = document.getElementById('newItemFormThree');
    const newItemFormFour = document.getElementById('newItemFormFour');
    const buttonItemFormTwo = document.getElementById('buttonItemForm');

    function resetFormInputs() {
        document.getElementById('products_id').value = '';
        document.getElementById('products_id_show').value = '';
        document.getElementById('products_name').value = '';
        document.getElementById('qty').value = '';
        document.getElementById('price').value = '';
        document.getElementById('total_qty_price').value = '';
    }

    function hideFormAddNewItem() {
        newItemForm.style.display = 'none';
        newItemFormTwo.style.display = 'none';
        newItemFormThree.style.display = 'none';
        newItemFormFour.style.display = 'none';
        buttonItemFormTwo.style.display = 'none';
    }

    addNewItemBtn.addEventListener('click', function() {
        if (newItemForm.style.display === 'none' || newItemForm.style.display === '' && newItemFormTwo.style.display === 'none' || newItemFormTwo.style.display === '' && newItemFormThree.style.display === 'none' || newItemFormThree.style.display === '' && newItemFormFour.style.display === 'none' || newItemFormFour.style.display === '' && buttonItemFormTwo.style.display === 'none' || buttonItemFormTwo.style.display === '') {
            newItemForm.style.display = 'flex';
            newItemFormTwo.style.display = 'flex';
            newItemFormThree.style.display = 'flex';
            newItemFormFour.style.display = 'flex';
            buttonItemFormTwo.style.display = 'flex';
        } else {
            hideFormAddNewItem();
            resetFormInputs();
        }
    });
</script>

<!-- FUNCTION MENGHITUNG TOTAL SETIAP BARIS PADA BUDGET DETAILS (TABLE) -->
<script>
    function calculateTotal(row) {
        const modifyInput = row.querySelector('input[name="modify_budget_details"]');
        const priceInput = row.querySelector('input[name="price_budget_details"]');
        const totalInput = row.querySelector('input[name="total_budget_details"]');
        const qtyAvail = row.children[4].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[4].textContent.trim().replace(/,/g, ''));
        const balancedBudget = row.children[7].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[7].textContent.trim().replace(/,/g, ''));
        const totalBudget = row.children[8].textContent.trim().replace(/,/g, '') == '-' ? 0 : parseFloat(row.children[8].textContent.trim().replace(/,/g, ''));

        const modifyValue = parseFloat(modifyInput.value.replace(/,/g, '')) || 0;
        const priceValue = parseFloat(priceInput.value.replace(/,/g, '')) || 0;
        
        const resultQtyInput = qtyAvail + modifyValue;

        if (resultQtyInput < 0) {
            Swal.fire("Error", `Qty must be greater than 0`, "error");
            modifyInput.value = qtyAvail;
        }

        const totalValue = modifyValue * priceValue;
        const resultTotalInput = balancedBudget + totalValue;

        if (resultTotalInput < 0) {
            Swal.fire("Error", `Total must be greater than 0`, "error");
        }

        totalInput.value = numberFormatPHPCustom(totalValue, 2);
    }

    $('#budgetTable tbody').on('keyup', 'input[name="modify_budget_details"], input[name="price_budget_details"]', function () {
        const row = $(this).closest('tr')[0];
        calculateTotal(row);
    });
</script>

<!-- FUNCTION UNTUK PENJUMLAHAN MODIFY, PRICE, TOTAL PADA MODIFY BUDGET LIST (CART) TABLE -->
<script>
    function calculateBudgetTotals() {
        let totalModify = 0;
        let totalPrice = 0;
        let totalAmount = 0;

        document.querySelectorAll('#listBudgetTable tbody tr').forEach(row => {
            let modifyValue = 0;
            let priceValue = 0;
            let totalValue = 0;

            if (row.cells.length > 11) {
                modifyValue = row.cells[9].textContent;
                priceValue = row.cells[10].textContent;
                totalValue = row.cells[11].textContent;
            } else {
                modifyValue = row.cells[8].textContent;
                priceValue = row.cells[9].textContent;
                totalValue = row.cells[10].textContent;
            }

            totalModify += parseFloat(modifyValue.replace(/,/g, ""));
            totalPrice += parseFloat(priceValue.replace(/,/g, ""));
            totalAmount += parseFloat(totalValue.replace(/,/g, ""));
        });

        document.getElementById('totalModifyFooter').textContent = numberFormatPHPCustom(totalModify, 2);
        document.getElementById('totalPriceFooter').textContent = numberFormatPHPCustom(totalPrice, 2);
        document.getElementById('totalAmountFooter').textContent = numberFormatPHPCustom(totalAmount, 2);

        document.getElementById('totalModifyFooterData').value = totalModify;
        document.getElementById('totalPriceFooterData').value = totalPrice;
        document.getElementById('totalAmountFooterData').value = totalAmount;
    }
</script>

<!-- FUNCTION BUTTON ADD TO CART FROM BUDGET DETAILS TABLE -->
<script>
    document.getElementById('buttonBudgetDetails').addEventListener('click', function () {
        const budgetTable = document.getElementById('budgetTable').querySelector('tbody');
        const listBudgetTable = document.getElementById('listBudgetTable').querySelector('tbody');
        let updated = false;
        let allBudgetDetailsData = [];
        let modifiedBudgetListData = [];

        // Ambil value yang ada sebelumnya di input `modifyBudgetListData`
        const existingModifyBudgetListData = document.getElementById('modifyBudgetListData').value;

        if (existingModifyBudgetListData) {
            try {
                modifiedBudgetListData = JSON.parse(existingModifyBudgetListData);
            } catch (error) {
                modifiedBudgetListData = [];
            }
        }

        [...budgetTable.rows].forEach((row, index) => {
            const productIdTemp = row.querySelector('input[name="product_id_show"]');
            const productId     = row.cells[1].textContent && row.cells[1].textContent != "null" ? row.cells[1].textContent.trim() : productIdTemp.value;
            const productName   = row.cells[2].textContent.trim();
            const qtyBudget     = row.cells[3].textContent.trim();
            const qtyAvail      = row.cells[4].textContent.trim();
            const price         = row.cells[5].textContent.trim();
            const currency      = row.cells[6].textContent.trim();
            const balanceBudget = row.cells[7].textContent.trim();
            const totalBudget   = row.cells[8].textContent.trim();
            const modifyInput   = row.querySelector('input[name="modify_budget_details"]');
            const priceInput    = row.querySelector('input[name="price_budget_details"]');
            const totalInput    = row.querySelector('input[name="total_budget_details"]');

            allBudgetDetailsData.push({
                productId,
                productName,
                qtyBudget,
                qtyAvail,
                price,
                currency,
                balanceBudget,
                totalBudget,
                modifyInput: modifyInput.value,
                priceInput: priceInput.value,
                totalInput: totalInput.value
            });

            if (productId && modifyInput.value && priceInput.value && totalInput.value) {
                let existingRow = [...listBudgetTable.rows].find(listRow => listRow.cells[2].textContent.trim() === productName && listRow.cells[3].textContent.trim() === qtyBudget && listRow.cells[4].textContent.trim() === qtyAvail && listRow.cells[5].textContent.trim() === price && listRow.cells[6].textContent.trim() === currency && listRow.cells[7].textContent.trim() === balanceBudget && listRow.cells[8].textContent.trim() === totalBudget);

                if (existingRow) {
                    existingRow.cells[0].textContent = productId;
                    existingRow.cells[9].textContent = numberFormatPHPCustom(modifyInput.value.replace(/,/g, ""), 2);
                    existingRow.cells[10].textContent = numberFormatPHPCustom(priceInput.value.replace(/,/g, ""), 2);
                    existingRow.cells[11].textContent = totalInput.value;
                    updated = true;
                } else {
                    const clonedRow = row.cloneNode(true);

                    const productIdValue = productId;
                    const modifyValue = numberFormatPHPCustom(modifyInput.value.replace(/,/g, ""), 2);
                    const priceValue = numberFormatPHPCustom(priceInput.value.replace(/,/g, ""), 2);
                    const totalValue = totalInput.value;

                    clonedRow.cells[0].textContent = productIdValue;
                    clonedRow.cells[9].textContent = modifyValue;
                    clonedRow.cells[10].textContent = priceValue;
                    clonedRow.cells[11].textContent = totalValue;

                    listBudgetTable.appendChild(clonedRow);
                    updated = true;
                }

                modifiedBudgetListData.push({
                    productId,
                    productName,
                    qtyBudget,
                    qtyAvail,
                    price,
                    currency,
                    balanceBudget,
                    totalBudget,
                    modifyInput: numberFormatPHPCustom(modifyInput.value.replace(/,/g, ""), 2),
                    priceInput: numberFormatPHPCustom(priceInput.value.replace(/,/g, ""), 2),
                    totalInput: totalInput.value
                });
            }
        });

        if (updated) {
            calculateBudgetTotals();

            document.getElementById('budgetDetailsData').value = JSON.stringify(allBudgetDetailsData);

            // Gabungkan data baru dengan data lama
            const combinedData = [
                ...modifiedBudgetListData.reduce((map, obj) => map.set(obj.productId, obj), new Map()).values(),
            ];

            document.getElementById('modifyBudgetListData').value = JSON.stringify(combinedData);
        } else {
            Swal.fire("Error", "Please fill in Product Id, Modify(+/-), Price, and Total for at least one row", "error");
        }
    });
</script>

<!-- FUNCTION UNTUK MENGHITUNG TOTAL (MODIFY * PRICE) -->
<script>
    function calculateTotalForm() {
        const qty = parseFloat(document.getElementById("qty_form").value.replace(/,/g, '')) || 0;
        const price = parseFloat(document.getElementById("price_form").value.replace(/,/g, '')) || 0;
        const total = qty * price;
        
        document.getElementById("total_qty_price").value = numberFormatPHPCustom(total, 2);
    }

    document.getElementById("qty_form").addEventListener("input", calculateTotalForm);
    document.getElementById("price_form").addEventListener("input", calculateTotalForm);
</script>

<!-- FUNCTION BUTTON ADD TO CART FORM ADD NEW ITEM -->
<script>
    document.getElementById("addToCartNewFormItem").addEventListener("click", function (event) {
        event.preventDefault();

        const productId = document.getElementById("products_id_show").value;
        const productName = document.getElementById("products_name").value;
        const qty = document.getElementById("qty_form").value.replace(/,/g, '');
        const price = document.getElementById("price_form").value.replace(/,/g, '');
        const total = document.getElementById("total_qty_price").value.replace(/,/g, '');
        const currencySymbolll = document.getElementById("currency_symbol").value;

        if (!productId || !productName || !qty || !price) {
            Swal.fire("Error", "Please fill all the fields before adding to cart.", "error");
            return;
        }

        let budgetListDataaa = [];
        const existingData = document.getElementById("modifyBudgetListData").value;
        if (existingData) {
            budgetListDataaa = JSON.parse(existingData);
        }

        const tbody = document.getElementById("listBudgetTable").getElementsByTagName("tbody")[0];

        // let productExists = false;
        // for (let row of tbody.rows) {
        //     if (row.cells[0].textContent === productId) {
        //         productExists = true;
        //         break;
        //     }
        // }

        // if (productExists) {
        //     Swal.fire("Error", "Product ID already exists in the table.", "error");
        //     return;
        // }

        budgetListDataaa.push({
            productId       : productId,
            productName     : productName,
            qtyBudget       : 0.00,
            qtyAvail        : 0.00,
            price           : 0.00,
            currency        : "USD",
            balanceBudget   : 0.00,
            totalBudget     : 0.00,
            modifyInput     : numberFormatPHPCustom(qty, 2),
            priceInput      : numberFormatPHPCustom(price, 2),
            totalInput      : numberFormatPHPCustom(total, 2),
        });

        document.getElementById("modifyBudgetListData").value = JSON.stringify(budgetListDataaa);

        const row = tbody.insertRow();

        const cell1 = row.insertCell();
        cell1.textContent = productId;
        cell1.classList.add("container-tbody-tr-budget");

        const cell2 = row.insertCell();
        cell2.textContent = productName;
        // cell2.classList.add("container-tbody-tr-budget");

        const cell3 = row.insertCell();
        cell3.textContent = numberFormatPHPCustom(0, 2);
        cell3.classList.add("container-tbody-tr-budget");

        const cell4 = row.insertCell();
        cell4.textContent = numberFormatPHPCustom(0, 2);
        cell4.classList.add("container-tbody-tr-budget");

        const cell5 = row.insertCell();
        cell5.textContent = numberFormatPHPCustom(0, 2);
        cell5.classList.add("container-tbody-tr-budget");

        const cell6 = row.insertCell();
        cell6.textContent = currencySymbolll;
        cell6.classList.add("container-tbody-tr-budget");

        const cell7 = row.insertCell();
        cell7.textContent = numberFormatPHPCustom(0, 2);
        cell7.classList.add("container-tbody-tr-budget");

        const cell8 = row.insertCell();
        cell8.textContent = numberFormatPHPCustom(0, 2);
        cell8.classList.add("container-tbody-tr-budget");

        const cell9 = row.insertCell();
        cell9.textContent = numberFormatPHPCustom(qty, 2);
        cell9.classList.add("container-tbody-tr-budget");

        const cell10 = row.insertCell();
        cell10.textContent = numberFormatPHPCustom(price, 2);
        cell10.classList.add("container-tbody-tr-budget");

        const cell11 = row.insertCell();
        cell11.textContent = numberFormatPHPCustom(total, 2);
        cell11.classList.add("container-tbody-tr-budget");

        calculateBudgetTotals();

        document.getElementById("products_id_show").value = "";
        document.getElementById("products_name").value = "";
        document.getElementById("qty_form").value = "";
        document.getElementById("price_form").value = "";
        document.getElementById("total_qty_price").value = "";
    });
</script>

<!-- MENAMPILKAN DATA MODIFY BUDGET LIST TABLE -->
<script>
    const modifyDataElement = document.getElementById('modifyBudgetListData');
    const modifyArrayData = JSON.parse(modifyDataElement.value);
    const modifyFooterDataElement = document.getElementById('totalModifyFooterData');
    const modifyFooterElement = document.getElementById('totalModifyFooter');
    const priceFooterDataElement = document.getElementById('totalPriceFooterData');
    const priceFooterElement = document.getElementById('totalPriceFooter');
    const amountFooterDataElement = document.getElementById('totalAmountFooterData');
    const amountFooterElement = document.getElementById('totalAmountFooter');

    if (modifyArrayData.length > 0) {
        modifyFooterElement.textContent = numberFormatPHPCustom(modifyFooterDataElement.value, 2);
        priceFooterElement.textContent = numberFormatPHPCustom(priceFooterDataElement.value, 2);
        amountFooterElement.textContent = numberFormatPHPCustom(amountFooterDataElement.value, 2);

        $.each(modifyArrayData, function(key, val2) {
            var html = 
                '<tr>' +
                    '<td class="container-tbody-tr-budget" style="text-align: center !important; display: none;">' +
                        val2.productId +
                    '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: center !important;">' +
                        val2.productId +
                    '</td>' +
                    '<td class="container-tbody-tr-budget" style="text-align: left !important; width: 50px;">' +
                        val2.productName +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        val2.qtyBudget +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' +
                        val2.qtyAvail +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        val2.price + 
                    '</td>' + 
                    '<td class="container-tbody-tr-budget">' + 
                        val2.currency +
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        val2.balanceBudget + 
                    '</td>' + 
                    '<td class="container-tbody-tr-budget">' + 
                        val2.totalBudget + 
                    '</td>' + 
                    '<td class="container-tbody-tr-budget">' +
                        val2.modifyInput + 
                    '</td>' +
                    '<td class="container-tbody-tr-budget">' + 
                        val2.priceInput + 
                    '</td>' +
                    '<td class="container-tbody-tr-budget" style="padding-right: 0px !important;">' + 
                        val2.totalInput +
                    '</td>'
                '</tr>';

            $('table#listBudgetTable tbody').append(html);
        });
    }
</script>

<!-- BUTTON SUBMIT DISABLED FALSE -->
<script>
    const siteCode = document.getElementById('site_code');
    const reasonForModify = document.getElementById('reason_modify');
    const submitButton = document.getElementById('submitButton');
    const listBudgetTableBody = document.querySelector('#listBudgetTable tbody');

    function checkTableData() {
        const isTableNotEmpty = listBudgetTableBody.rows.length > 0;
        const isSiteCodeNotEmpty = siteCode.value.trim() !== '';
        const isReasonNotEmpty = reasonForModify.value.trim() !== '';

        if (isTableNotEmpty && isSiteCodeNotEmpty && isReasonNotEmpty) {
            submitButton.disabled = false;
        } else {
            submitButton.disabled = true;
        }
    }

    checkTableData();

    const observerListBudgetTableBody = new MutationObserver(checkTableData);
    observerListBudgetTableBody.observe(listBudgetTableBody, { childList: true });

    siteCode.addEventListener('input', checkTableData);
    reasonForModify.addEventListener('input', checkTableData);
</script>

<!-- FUNCTION BUTTON CANCEL -->
<script>
    const cancelButton = document.getElementById('cancelButton');
    const budgetTbodyTable = document.querySelector('#budgetTable tbody');

    cancelButton.addEventListener('click', function() {
        while (budgetTbodyTable.firstChild) {
            budgetTbodyTable.removeChild(budgetTbodyTable.firstChild);
        }

        while (listBudgetTableBody.firstChild) {
            listBudgetTableBody.removeChild(listBudgetTableBody.firstChild);
        }

        $("#project_code_popup").prop("disabled", false);
        $("#site_code_popup").prop("disabled", false);
        $("#currency_popup").prop("disabled", false);

        $("#project_id").val("");
        $("#project_code").val("");
        $("#project_name").val("");

        $("#site_id").val("");
        $("#site_code").val("");
        $("#site_name").val("");

        $("#reason_modify").val("");
        $("#currency_id").val("");
        $("#currency_symbol").val("");
        $("#currency_name").val("");
        $("#exchange_rate").val("");
        $("#value_co").val("");

        $("#budgetDetailsData").val("");
        $("#modifyBudgetListData").val("");
        $("#totalModifyFooterData").val("");
        $("#totalPriceFooterData").val("");
        $("#totalAmountFooterData").val("");

        document.getElementById('totalModifyFooter').textContent = 0;
        document.getElementById('totalPriceFooter').textContent = 0;
        document.getElementById('totalAmountFooter').textContent = 0;
    });
</script>