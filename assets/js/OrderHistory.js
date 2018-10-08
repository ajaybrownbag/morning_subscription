class OrderHistory{
  // Default Constructor
  constructor(){}
  // Blocking UI
	static async blockUI(status){
		if(status){
			this.requestCount+=1;
			$("#blockUI").remove();
			$("body").append('<div id="blockUI"><div class="message text-center"><span class="processing"><i class="fa fa-sun-o fa-spin fa-3x"></i></span></div></div>');
		}else{
			this.requestCount-=1;
			if(!this.requestCount){
				$("#blockUI").remove();
			}
		}
	}
  // Communicate with server
	static async sendRequest(url,data){
		return $.ajax({
			url: url,
			data: data,
			type: 'POST',
			dataType:'json',
			beforeSend: function(){},
			success: function(response){
				return response;
			},
			error: function(){
				return {status:false,message:"Failed to process your request"};
			}
		});
	}

  static async loadOrderItems(txn_id){
    var $self = this;
    var response = await $self.sendRequest("ajax/order_items",{txn_id});
    var itemsTotal = 0;
    var div = $("<div>");
    var table = $("<table></table>").addClass("table")
      .attr("cellpadding","5")
      .attr("cellspacing", "0")
      .attr("border", "0")
      .css({"width":"100%","paddingLeft":"50px"});
    var th = $("<tr>");
      th.append("<td><i class='fa fa-image'></i></td>");
      th.append("<td><b>Product</b></td>");
      th.append("<td><b>Unit</b></td>");
      th.append("<td><b>MRP</b></td>");
      th.append("<td><b>Price</b></td>");
      th.append("<td><b>Quantity</b></td>");
      th.append("<td><b>Total</b></td>");
      table.append(th);
    $.each(response,function(idx,row){
      var tr = $("<tr>");
      tr.attr("data-product_id",row.product_id);
      tr.attr("data-txn_id",row.txn_id);
      tr.attr("data-product_mrp",row.product_mrp);
      tr.attr("data-product_price",row.product_price);
      tr.addClass("product-row");
      tr.append("<td><img src='"+row.product_image_url+"' class='img-responsive' style='height:20px;'></td>");
      tr.append("<td><a target='_BLANK' href='"+window.base_url+"product-details/"+row.seourls+"'>"+row.product_name+"</a></td>");
      tr.append("<td>"+row.unit+"</td>");
      tr.append("<td>"+row.product_mrp+"</td>");
      tr.append("<td>"+row.product_price+"</td>");
      tr.append("<td>"+row.quantity+"</td>");
      tr.append("<td>"+row.total+"</td>");
      itemsTotal += row.total;
      table.append(tr);
    });
    var span = $("<span>").addClass("pull-right").html("<b>Sub Total: <i class='fa fa-inr'></i>"+itemsTotal+"</b>");
    div.append(table);
    div.append($("<hr style='margin:5px 0;'>"));
    div.append(span);
    return div;
  }

  static async loadOrders(){
    var $self = this;
    var options = {
			"serverSide": true,
			"processing": true,
      "searching": false,
			"ajax": {
				"url": "ajax/my_orders",
				"type": "POST",
				'data': function(data){
					data.daterange = $("input#subs-history-daterange").val();
				},
			},
			'createdRow': function( row, data, dataIndex ) {
				$(row).attr('id', data.txn_id);
			},
			"columns": [
				{
					"className": 'details-control',
					"orderable": false,
					"data": "details",
					"defaultContent": ''
				},
				{ "data": "txn_id" },
				{ "data": "total_items","orderable":false },
        { "data": "delivery_charge" },
        { "data": "total_amount" },
				{ "data": "delivery_date" }
			],
			"order": [[1, 'desc']],
			"fnDrawCallback" : function() {},
			"language": {
				"paginate": {
				  "previous": "<i class='fa fa-caret-left'></i>",
				  "next": "<i class='fa fa-caret-right'></i>"
				},
				"processing": function(){
					return "<i class='fa fa-sun-o fa-spin fa-2x'></i>";
				}
			},
		};
    return await $("#subscription-history-table").DataTable(options);
  }

  //Initialization
  static async init(){
    var $self = this;
    var ordersTable = await $self.loadOrders();
    $("#subscription-history-table_wrapper .row:first .col-sm-6:last").html('<div class="pull-right"><input type="text" id="subs-history-daterange" class="form-control" placeholder="Delivery date range"></div>');
    $("input#subs-history-daterange").daterangepicker({
       minDate: moment("2018-04-01").format("YYYY-MM-DD"),
       startDate:moment().subtract(1,"months").format("YYYY-MM-DD"),
       endDate: moment().format("YYYY-MM-DD"),
       locale: {format: 'YYYY-MM-DD'},
       opens: 'left'
    }).on('apply.daterangepicker', function(ev, picker) {
       ordersTable.ajax.reload();
    });
    $('table#subscription-history-table tbody').on('click', 'td.details-control', async function () {
     var tr = $(this).closest('tr');
     var row = ordersTable.row( tr );
     if ( row.child.isShown() ) {
       row.child.hide();
       tr.removeClass('shown');
     }else {
       tr.addClass("loading");
       var subtable = await $self.loadOrderItems(tr.attr('id'));
       row.child(subtable).show();
       tr.addClass('shown');
       tr.removeClass("loading");
     }
   });
  }
}
