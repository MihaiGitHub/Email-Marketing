var TableEditable = function () {

    return {

        //main function to initiate the module
        init: function () {
            function restoreRow(oTable, nRow) {
				
				
                var aData = oTable.fnGetData(nRow);
				
				
				
                var jqTds = $('>td', nRow);

                for (var i = 0, iLen = jqTds.length; i < iLen; i++) {
                    oTable.fnUpdate(aData[i], nRow, i, false);
                }

                oTable.fnDraw();
            }

            function editRow(oTable, nRow) {
                var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '';
                jqTds[1].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '';
                jqTds[3].innerHTML = '';
				jqTds[4].innerHTML = '';
                jqTds[5].innerHTML = '<a class="update" href="#">Save</a>';
                jqTds[6].innerHTML = '<a class="cancel" href="#">Cancel</a>';
            }
// SAVE NEW ROW
            function saveRow(oTable, nRow) {
				
                var jqInputs = $('input', nRow);
								
				var jData = {};
				jData.action = 'save';
				jData.name = jqInputs[0].value;
				
				
				
				$.ajax({
						  type: 'POST',
						  url: 'save-lists.php',
						  async: true,
						  data: jData,
						  error: function(error) {
								console.log('error', error.error())
						  },
						  dataType: 'json',
						  success: function(data) { console.log('data ',data)
						  		location.reload();
						  },
				});
				
		
				
				/*
                oTable.fnUpdate(jqInputs[0].value, nRow, 1, false);
          //      oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
          //      oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
         //       oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
                oTable.fnUpdate('<a class="edit" href="">Edit</a>', nRow, 5, false);
                oTable.fnUpdate('<a class="delete" href="">Delete</a>', nRow, 6, false);
                oTable.fnDraw();
				*/
            }
// UPDATE ROW
function updateRow(oTable, nRow, id) { console.log('update record ajax function')
				
                var jqInputs = $('input', nRow);
				
								
				var jData = {};
				jData.action = 'update';
				jData.name = jqInputs[0].value;
				jData.listid = id;
					
													
				$.ajax({
						  type: 'POST',
						  url: 'save-lists.php',
						  async: true,
						  data: jData,
						  error: function(error) {
								console.log('error', error.error())
						  },
						  dataType: 'json',
						  success: function(data) {
						  		location.reload();
						  },
				});
				
				/*
				var string = "<a href='emails.php?id='"+id+">View</a>".replace(" ", "");
				
				 oTable.fnUpdate(jqInputs[0].value, nRow, 1, false);
          //      oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
          //      oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                 oTable.fnUpdate(string, nRow, 4, false);
                oTable.fnUpdate('<a class="edit" href="#">Edit</a>', nRow, 5, false);
                oTable.fnUpdate('<a class="delete" href="#">Delete</a>', nRow, 6, false);
                oTable.fnDraw();
			*/
            }
            function cancelEditRow(oTable, nRow) {
                var jqInputs = $('input', nRow);
                oTable.fnUpdate(jqInputs[0].value, nRow, 0, false);
                oTable.fnUpdate(jqInputs[1].value, nRow, 1, false);
                oTable.fnUpdate(jqInputs[2].value, nRow, 2, false);
                oTable.fnUpdate(jqInputs[3].value, nRow, 3, false);
				oTable.fnUpdate(jqInputs[4].value, nRow, 4, false);
                oTable.fnUpdate('<a class="edit" href="#">Edit</a>', nRow, 5, false);
                oTable.fnDraw();
            }
			
			function saveNewRecord(oTable, nRow){
				
				var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '';
                jqTds[1].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
                jqTds[2].innerHTML = '';
                jqTds[3].innerHTML = '';
				jqTds[4].innerHTML = '';
                jqTds[5].innerHTML = '<a class="save" href="#">Save</a>';
                jqTds[6].innerHTML = '<a class="cancel" href="#">Cancel</a>';
				
			}
/////////////////////////////////////EMAILS TABLE////////////////////////////////////////////
// edit email row
function editEmailRow(oTable, nRow) {
		var aData = oTable.fnGetData(nRow);
		var jqTds = $('>td', nRow);
		jqTds[0].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
		jqTds[1].innerHTML = '';
		jqTds[2].innerHTML = '<a class="update" href="#">Save</a>';
		jqTds[3].innerHTML = '<a class="cancel" href="#">Cancel</a>';
}
// SAVE NEW ROW
function saveEmailRow(oTable, nRow) {
	
	var jqInputs = $('input', nRow);
					
	var jData = {};
	jData.action = 'save';
	jData.email = jqInputs[0].value;
	
	$.ajax({
			  type: 'POST',
			  url: 'save-emails.php',
			  async: true,
			  data: jData,
			  error: function(error) {
					console.log('error', error.error())
			  },
			  dataType: 'json',
			  success: function(data) { console.log('success reload page');
					location.reload();
			  },
	});
}
function saveNewEmail(oTable, nRow){
				
				var aData = oTable.fnGetData(nRow);
                var jqTds = $('>td', nRow);
                jqTds[0].innerHTML = '<input type="text" class="m-wrap small" value="' + aData[1] + '">';
                jqTds[1].innerHTML = '';
                jqTds[2].innerHTML = '<a class="save" href="#">Save</a>';
                jqTds[3].innerHTML = '<a class="cancel" href="#">Cancel</a>';
				
}
			
var oTableEmails = $('#emails-list').dataTable({
                "aLengthMenu": [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });
		            var nEmailEditing = null;
	
			$('#email-add').click(function (e) {  console.log('oTable ',oTable)
			 
			 
				e.preventDefault();
				
				
				var aiNew = oTableEmails.fnAddData(['', '',
                        '<a class="edit" href="#">Edit</a>', '<a class="cancel" data-mode="new" href="#">Cancel</a>'
                ]);				

				var nRow = oTableEmails.fnGetNodes(aiNew[0]);
				
				
				editEmailRow(oTableEmails, nRow);
				saveNewEmail(oTableEmails, nRow);
				nEmailEditing = nRow;
				
		/*		*/
				
            });

// when clicking on first save and saving record for first time		
 $('#emails-list').on('click', 'a.save', function (e) {
 	console.log('NEW SAVE')
	e.preventDefault();

    var nRow = $(this).parents('tr')[0];
	saveEmailRow(oTableEmails, nEmailEditing);
    nEmailEditing = null;		
				
 });
//////////////////////////////////////////////////////////////////////////////////////////////////

            var oTable = $('#lists-names').dataTable({
                "aLengthMenu": [
                    [10, 50, 100, -1],
                    [10, 50, 100, "All"] // change per page values here
                ],
                // set the initial value
                "iDisplayLength": 10,
                "sDom": "<'row-fluid'<'span6'l><'span6'f>r>t<'row-fluid'<'span6'i><'span6'p>>",
                "sPaginationType": "bootstrap",
                "oLanguage": {
                    "sLengthMenu": "_MENU_ records per page",
                    "oPaginate": {
                        "sPrevious": "Prev",
                        "sNext": "Next"
                    }
                },
                "aoColumnDefs": [{
                        'bSortable': false,
                        'aTargets': [0]
                    }
                ]
            });

    //        jQuery('#sample_editable_1_wrapper .dataTables_filter input').addClass("m-wrap medium"); // modify table search input
   //         jQuery('#sample_editable_1_wrapper .dataTables_length select').addClass("m-wrap xsmall"); // modify table per page dropdown
//
            var nEditing = null;

            $('#lists-add').click(function (e) { console.log('oTable ',oTable)
				e.preventDefault();
				var aiNew = oTable.fnAddData(['', '', '', '', '',
                        '<a class="edit" href="#">Edit</a>', '<a class="cancel" data-mode="new" href="#">Cancel</a>'
                ]);				

				var nRow = oTable.fnGetNodes(aiNew[0]);
			//	editRow(oTable, nRow);
				saveNewRecord(oTable, nRow);
				nEditing = nRow;
				
				
            });
			
			

            $('#lists-names').on('click', 'a.delete', function (e) {

                e.preventDefault();

                var nRow = $(this).parents('tr')[0];
                oTable.fnDeleteRow(nRow);
				
                var jData = {};
				jData.action = 'delete';
				jData.listid = $(this).parents('tr').attr('id').valueOf();

				
				$.ajax({
						  type: 'POST',
						  url: 'save-lists.php',
						  async: true,
						  data: jData,
						  error: function(error) {
								console.log('error', error.error())
						  },
						  dataType: 'json',
						  success: function(data) {
						  	//	location.reload();
						  },
				});
            });

            $('#lists-names').on('click', 'a.cancel', function (e) {
                e.preventDefault();
								
				if ($(this).attr("data-mode") == "new") { console.log('new')
                    var nRow = $(this).parents('tr')[0];
                    oTable.fnDeleteRow(nRow);
                } else { console.log('not new')
                    restoreRow(oTable, nEditing);
                    nEditing = null;
                }
				
            });
			
// when clicking on first save and saving record for first time		
 $('#lists-names').on('click', 'a.save', function (e) {
 	console.log('NEW SAVE')
	e.preventDefault();

    var nRow = $(this).parents('tr')[0];
	saveRow(oTable, nEditing);
    nEditing = null;		
				
 });
 // when cliking on second save and updating record
  $('#lists-names').on('click', 'a.update', function (e) {
	
	e.preventDefault();

    var nRow = $(this).parents('tr')[0];
	var id = $(this).parents('tr').attr('id').valueOf();
	
	console.log('nRow ',nRow)
	
	updateRow(oTable, nEditing, id);
    nEditing = null;	
	
				
 });
 
            $('#lists-names a.edit').on('click', function (e) {
                e.preventDefault();

                var nRow = $(this).parents('tr')[0];

                if (nEditing !== null && nEditing != nRow) { 
				
					
					console.log('Currently editing - but not this row - restore the old before continuing to edit mode')
				
				
				
				
                    restoreRow(oTable, nEditing);
                    editRow(oTable, nRow);
                    nEditing = nRow;
					
					
                } else if (nEditing == nRow && this.innerHTML == "Save") {
					
					
					console.log('Editing this row and want to save it')
			//		return false;
					
					
					
                    saveRow(oTable, nEditing);
                    nEditing = null;
                    
					
					
                } else { console.log('No edit in progress - lets start one')
				
                    editRow(oTable, nRow);
                    nEditing = nRow;
                }
            });
			
			
        }

    };

}();