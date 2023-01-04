<div id="updateBoughtOrder_Modal" role="dialog" tabindex="-1" class="modal fade" >
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Order Details</h4><button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></div>
            <div class="modal-body">
                <form id="boughtOrderForm" >
                    <div class="form-row">
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group"><label>Date*</label><input id="ord_date" name="ord_date" type="text" class="form-control" readonly /></div>
                            <div class="form-group"><label>Order List*</label><textarea id="ord_list" name="ord_list" class="form-control" readonly rows="9"></textarea></div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-5 col-lg-5 col-xl-5">
                            <div class="form-group"><label>Destination*</label><textarea id="dest" name="dest" class="form-control" readonly rows="2"></textarea></div>
                            <div class="form-group"><label>Service Fee*</label><input id="ser_fee" name="ser_fee" type="number" class="form-control" readonly /></div>
                            <div class="form-group"><label>Delivery Fee*</label><input id="del_fee" name="del_fee" type="number" class="form-control" readonly /></div>
                            <div class="form-group"><label>Order Price*</label><input id="ord_price" name="ord_price" type="number" class="form-control" readonly/></div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-7 col-lg-7 col-xl-7">
                            <div class="form-group">
                                <div id="customerContacts" class="form-group">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <input id="ordr_id" name="ordr_id" type="hidden"/>
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
                <button id="newBoughtUpdate" class="btn btn-primary" type="button">Deliver Order</button>
            </div>
        </div>
    </div>
</div>