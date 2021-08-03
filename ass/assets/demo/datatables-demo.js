// Call the dataTables jQuery plugin
$(document).ready(function() {
  $('#dataTable').DataTable({
  	"pageLength": 5,
    "lengthMenu": [[5, 15, 50, -1], [5, 15, 50, "All"]]
  });
});
