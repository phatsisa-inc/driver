<div id="updateNewOrder_Modal" role="dialog" tabindex="-1" class="modal fade" >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <form id="newOrderForm" >
                    <div class="form-row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group"><label>Date*</label><input id="o_date" name="o_date" type="text" class="form-control" readonly /></div>
                            <div class="form-group"><label>Order List*</label><textarea id="o_list" name="o_list" class="form-control" readonly rows="9"></textarea></div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                            <div class="form-group"><label>Destination*</label><textarea id="destination" name="destination" class="form-control" readonly rows="2"></textarea></div>
                            <div class="form-group"><label>Service Fee*</label><input id="s_fee" name="s_fee" type="number" class="form-control" readonly /></div>
                            <div class="form-group"><label>Delivery Fee*</label><input id="d_fee" name="d_fee" type="number" class="form-control" readonly /></div>
                            <div class="form-group"><label>Order Price*</label><input id="o_price" name="o_price" type="number" class="form-control" /></div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div id="customerContacts" class="form-group">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input id="ord_id" name="ord_id" type="hidden" class="form-control" />
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button id="newOrderUpdate" class="btn btn-primary" type="button">Update Order</button>
            </div>
        </div>
    </div>
</div>