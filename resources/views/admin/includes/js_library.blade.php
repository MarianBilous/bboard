<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/popper.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>

<!--plugins-->
<script src="{{ asset('assets/plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('assets/plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/plugins/edittable/bstable.js') }}"></script>

<!--notification js -->
<script src="{{ asset('assets/plugins/notifications/js/lobibox.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notifications.min.js') }}"></script>
<script src="{{ asset('assets/plugins/notifications/js/notification-custom-script.js') }}"></script>

<script>
    // Example with a add new row button & only some columns editable & removed actions column label
    var example2 = new BSTable("table2", {
        editableColumns: "1,2",
        $addButton: $('#table2-new-row-button'),
        onEdit: function () {
            console.log("EDITED");
        },
        advanced: {
            columnLabel: ''
        }
    });
    example2.init();
</script>
<!-- App JS -->
<script src="{{ asset('assets/js/app.js') }}"></script>
