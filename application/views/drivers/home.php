<section class="mt-2">
    <div class="container-fluid">
        <!-- Bordered tabs-->
        <ul id="myTab1" role="tablist" class="nav nav-tabs nav-pills with-arrow flex-column flex-sm-row text-center">
            <li class="nav-item flex-sm-fill">
                <a id="home1-tab" data-toggle="tab" href="#home1" role="tab" aria-controls="home1" aria-selected="true" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border active">Pending</a>
            </li>
            <li class="nav-item flex-sm-fill">
                <a id="profile1-tab" data-toggle="tab" href="#profile1" role="tab" aria-controls="profile1" aria-selected="false" class="nav-link text-uppercase font-weight-bold mr-sm-3 rounded-0 border">Bought</a>
            </li>
            <li class="nav-item flex-sm-fill">
                <a id="contact1-tab" data-toggle="tab" href="#contact1" role="tab" aria-controls="contact1" aria-selected="false" class="nav-link text-uppercase font-weight-bold rounded-0 border">Delivered</a>
            </li>
        </ul>
        <div id="myTab1Content" class="tab-content">
            <div id="home1" role="tabpanel" aria-labelledby="home-tab" class="tab-pane fade px-4 py-5 show active">
                <div class="table-responsive">
                    <table id="tbl_newOrders" style="width:100%" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>TOTAL FEE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>TOTAL FEE</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="profile1" role="tabpanel" aria-labelledby="profile-tab" class="tab-pane fade px-4 py-5">
                <div class="table-responsive">
                    <table id="tbl_readyOrders" style="width:100%" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>TOTAL FEE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>TOTAL FEE</th>
                                <th>ACTION</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div id="contact1" role="tabpanel" aria-labelledby="contact-tab" class="tab-pane fade px-4 py-5">
                <div class="table-responsive">
                    <table id="tbl_completeOrders" style="width:100%" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>ORDER PRICE</th>
                                <th>CLAIM</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>DATE</th>
                                <th>ORDER PRICE</th>
                                <th>CLAIM</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {
        $('#tbl_newOrders').DataTable({
            "ajax": {
                url: "<?php echo base_url(); ?>getneworder",
                type: 'GET'
            }
        });
        $('#tbl_readyOrders').DataTable({
            "ajax": {
                url: "<?php echo base_url(); ?>getreadyorder",
                type: 'GET'
            }
        });
        $('#tbl_completeOrders').DataTable({
            "ajax": {
                url: "<?php echo base_url(); ?>getcompleteorder",
                type: 'GET'
            }
        });
        /*Fetch New Order Function*/
        $(document).on('click', '.viewNew_Order', function () {
            var ord_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url(); ?>fetchorder",
                method: "POST",
                data: {ord_id: ord_id},
                dataType: "json",
                success: function (data)
                {
                    $('#o_date').val(data.ord_create_date);
                    $('#o_list').val(data.ord_list);
                    $('#destination').val(data.ord_destination);
                    $('#s_fee').val(data.ord_service_fee);
                    $('#d_fee').val(data.ord_delivery_fee);
                    $('#ord_id').val(data.ord_id);
                    $('#customerContacts').html(data.usr_contacts);
                    $('#updateNewOrder_Modal').modal('show');
                }
            });
        });
        /*Edit New Order Function*/
        $(document).on('click', '#newOrderUpdate', function () {
            event.preventDefault();
            var flag = 0;
            var ord_id = $('#ord_id').val();
            var ord_create_date = $('#o_date').val();
            var ord_list = $('#o_list').val();
            var ord_destination = $('#destination').val();
            var ord_delivery_fee = $('#d_fee').val();
            var ord_service_fee = $('#s_fee').val();
            var ord_price = $('#o_price').val();
            if (ord_price == '' || ord_price == undefined) {
                $('#o_price').css('border', '1px solid red');
                flag = 1;
            }
            if (flag == 0) {
                $.ajax({
                    url: "<?php echo base_url(); ?>editneworder",
                    method: "POST",
                    data: {ord_id: ord_id, ord_create_date: ord_create_date, ord_list: ord_list, ord_destination: ord_destination, ord_delivery_fee: ord_delivery_fee, ord_service_fee: ord_service_fee, ord_price: ord_price},
                    error: function (data) {
                        toastr.success(data);
                    },
                    success: function (data) {
                        toastr.success(data);
                        $('#newOrderForm')[0].reset();
                        $('#updateNewOrder_Modal').modal('hide');
                        dataTable.ajax.reload();
                    }
                });
            } else {
                toastr.error('Enter Order Price!');
            }
        });
        /*Fetch Bought Order Function*/
        $(document).on('click', '.viewBought_Order', function () {
            var ord_id = $(this).attr("id");
            $.ajax({
                url: "<?php echo base_url(); ?>fetchorder",
                method: "POST",
                data: {ord_id: ord_id},
                dataType: "json",
                success: function (data)
                {
                    $('#ord_date').val(data.ord_create_date);
                    $('#ord_list').val(data.ord_list);
                    $('#dest').val(data.ord_destination);
                    $('#ser_fee').val(data.ord_service_fee);
                    $('#del_fee').val(data.ord_delivery_fee);
                    $('#ord_price').val(data.ord_price);
                    $('#ordr_id').val(data.ord_id);
                    $('#customerContacts').html(data.usr_contacts);
                    $('#updateBoughtOrder_Modal').modal('show');
                }
            });
        });
        /*Edit Bought Order Function*/
        $(document).on('click', '#newBoughtUpdate', function () {
            event.preventDefault();
            var ord_id = $('#ordr_id').val();
            $.ajax({
                url: "<?php echo base_url(); ?>editboughtorder",
                method: "POST",
                data: {ord_id: ord_id},
                error: function (data) {
                    toastr.success(data);
                },
                success: function (data) {
                    toastr.success(data);
                    $('#boughtOrderForm')[0].reset();
                    $('#updateBoughtOrder_Modal').modal('hide');
                    dataTable.ajax.reload();
                }
            });
        });
    });
</script>

