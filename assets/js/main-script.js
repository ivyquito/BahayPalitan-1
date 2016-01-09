
function editPlan(url, id,name,description,amount) {
    bootbox.dialog({
                title: "<i class='fa fa-pencil'></i> Edit Plan",
                message: '<div>'+
                            '<form action="" method="post">'+
                                '<div class="form-group">'+
                                    '<label for="planName">Plan Name</label>'+
                                    '<input type="text" value="'+name+'" class="planName form-control"/>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="planDescription">Plan Description</label>'+
                                    '<input type="text" value="'+description+'" class="planDescription form-control"/>'+
                                '</div>'+
                                '<div class="form-group">'+
                                    '<label for="planAmount">Plan Amount</label>'+
                                    '<input type="text" value="'+amount+'" class="planAmount form-control"/>'+
                                    '<input type="hidden" name="id" id="id" value="'+id+'"/>'+
                                '</div>'+
                            '</form>'+
                         '</div>',
                buttons: {
                    success: {
                        label: "<i class='fa fa-pencil'></i> Update",
                        className: "btn-success",
                        callback: function () {
                            var id = $('#id').val();
                            var name = $('.planName').val();
                            var description = $('.planDescription').val();
                            var amount = $('.planAmount').val();
                            $.ajax({                   
                                    url: url+'index.php/admin_page_plans/editPlan',
                                    type: 'POST',
                                    cache: false,
                                    dataType: 'HTML',
                                    data: {
                                      id: id,
                                      name: name,
                                      description: description,
                                      amount: amount
                                    },
                                    success: function (response) {
                                        
                                     bootbox.alert('<h3><i class="fa fa-share"></i> '+response+'</h3>', function(){
                                         window.location.reload();
                                     });
                                    }
                            });
                           
                        }
                        
                    }
                } // close of button
                
            }
                    
        );       
}

function deletePlan(url, id){
    bootbox.confirm('<h4><i class="fa fa-trash"></i> Are you sure you want to delete ?</h4>',function(response) {
        if (response == true) {
            $.ajax({                   
                url: url+'index.php/admin_page_plans/deletePlan',
                type: 'POST',
                cache: false,
                dataType: 'HTML',
                data: {
                  id: id
                },
                success: function (response) {
                 bootbox.alert('<h4><i class="fa fa-share"></i> '+response+'</h4>', function(){
                     $('.tr'+id).hide('slow');
                 });
                }
        });
        }
    });
}

function editHouseType(url, id, description) {
     bootbox.dialog({
                title: "<i class='fa fa-pencil'></i> Edit House Type",
                message: '<div>'+
                            '<form action="" method="post">'+
                                '<div class="form-group">'+
                                    '<label for="houseTypeDescription">House Type Description</label>'+
                                    '<input type="text" value="'+description+'" class="houseTypeDescription form-control"/>'+
                                '</div>'+
                                '<input type="hidden" name="id" id="id" value="'+id+'"/>'+
                            '</form>'+
                         '</div>',
                buttons: {
                    success: {
                        label: "<i class='fa fa-pencil'></i> Update",
                        className: "btn-success",
                        callback: function () {
                            var id = $('#id').val();
                            var description = $('.houseTypeDescription').val();
                            $.ajax({                   
                                    url: url+'index.php/admin_page_housetype/editHouseType',
                                    type: 'POST',
                                    cache: false,
                                    dataType: 'HTML',
                                    data: {
                                      id: id,
                                      description: description
                                    },
                                    success: function (response) {
                                        
                                     bootbox.alert('<h4><i class="fa fa-share"></i> '+response+'</h4>', function(){
                                         window.location.reload();
                                     });
                                    }
                            });
                           
                        }
                        
                    }
                } // close of button
                
            }
                    
        );
}


function deleteHouseType(url, id){
    bootbox.confirm('<h4><i class="fa fa-trash"></i> Are you sure you want to delete ?</h4>',function(response) {
        if (response == true) {
            $.ajax({                   
                url: url+'index.php/admin_page_housetype/deleteHouseType',
                type: 'POST',
                cache: false,
                dataType: 'HTML',
                data: {
                  id: id
                },
                success: function (response) {
                 bootbox.alert('<h4><i class="fa fa-share"></i> '+response+'</h4>', function(){
                     $('.tr'+id).hide('slow');
                 });
                }
        });
        }
    });
}

function editHouseAreaType(url, id, description) {
    bootbox.dialog({
                title: "<i class='fa fa-pencil'></i> Edit House Area Type",
                message: '<div>'+
                            '<form action="" method="post">'+
                                '<div class="form-group">'+
                                    '<label for="houseAreaTypeDescription">House Area Type Description</label>'+
                                    '<input type="text" value="'+description+'" class="houseAreaTypeDescription form-control"/>'+
                                '</div>'+
                                '<input type="hidden" name="id" id="id" value="'+id+'"/>'+
                            '</form>'+
                         '</div>',
                buttons: {
                    success: {
                        label: "<i class='fa fa-pencil'></i> Update",
                        className: "btn-success",
                        callback: function () {
                            var id = $('#id').val();
                            var description = $('.houseAreaTypeDescription').val();
                            $.ajax({                   
                                    url: url+'index.php/admin_page_houseareas/editHouseAreaType',
                                    type: 'POST',
                                    cache: false,
                                    dataType: 'HTML',
                                    data: {
                                      id: id,
                                      description: description
                                    },
                                    success: function (response) {
                                        
                                     bootbox.alert('<h4><i class="fa fa-share"></i> '+response+'</h4>', function(){
                                         window.location.reload();
                                     });
                                    }
                            });
                           
                        }
                        
                    }
                } // close of button
                
            }
                    
        );
}

function deleteHouseAreaType(url, id) {
    bootbox.confirm('<h4><i class="fa fa-trash"></i> Are you sure you want to delete ?</h4>',function(response) {
        if (response == true) {
            $.ajax({                   
                url: url+'index.php/admin_page_houseareas/deleteHouseAreaType',
                type: 'POST',
                cache: false,
                dataType: 'HTML',
                data: {
                  id: id
                },
                success: function (response) {
                 bootbox.alert('<h4><i class="fa fa-share"></i> '+response+'</h4>', function(){
                     $('.tr'+id).hide('slow');
                 });
                }
        });
        }
    });
}


function deleteSubscriber(url, id) {
    bootbox.confirm('<h4><i class="fa fa-trash"></i> Are you sure you want to delete ?</h4>',function(response) {
        if (response == true) {
            $.ajax({                   
                url: url+'index.php/admin_page_subscribers/deleteSubscriber',
                type: 'POST',
                cache: false,
                dataType: 'HTML',
                data: {
                  id: id
                },
                success: function (response) {
                 bootbox.alert('<h4><i class="fa fa-share"></i> '+response+'</h4>', function(){
                     $('.tr'+id).hide('slow');
                 });
                }
        });
        }
    });
}