// var i = 0;
// $("#add").click(function () {
//     ++i;
//     $("#dynamicAddRemove").append(
//         '<tr><td><input type="text" name="add_attribute[' +
//             i +
//             '][attribute_name]" placeholder="Enter title" class="form-control" /></td><td><select name="add_attribute[0][package_id]" id="" class="form-control"><?php foreach ($packages as $data){<option value="{{ $data->id }}">{{ $data->package_name }}</option>}?></select></td><td><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>'
//     );
// });
// $(document).on("click", ".remove-tr", function () {
//     $(this).parents("tr").remove();
// });




$(document).ready(function(){
    let row_number = 1;
    $("#add").click(function(e){
      e.preventDefault();
      let new_row_number = row_number - 1;
      $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
      $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
      row_number++;
    });

    $("#delete").click(function(e){
      e.preventDefault();
      if(row_number > 1){
        $("#product" + (row_number - 1)).html('');
        row_number--;
      }
    });
  });
