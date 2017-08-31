<div class="paddingbottom15" id="confirm">
    Are you sure you want to delete this data?
</div>
<div class="form-button right">
    <input type="submit" id="yes" name="yes" class="btn btn-primary" value="Yes" />
    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#yes').click(function() {
			var dataString = 'id=<?php echo $id; ?>&delete=yes';
			$.ajax(
			{
				type: "POST",
				url: '<?php echo $action; ?>',
				data: dataString, 
				cache: false,
				beforeSend: function()
				{
					$('#confirm').html('<i class="fa fa-spinner fa-spin"></i>');
				},
				success: function(data)
				{
					var response = $.parseJSON(data);
                    $('#myModal').modal('hide');
					window.location.reload();
				}
			});
			return false;
		});
    });
</script>