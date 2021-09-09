<!-- JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!--plugins-->
<script src="{{ asset('plugins/simplebar/js/simplebar.min.js') }}"></script>
<script src="{{ asset('plugins/metismenu/js/metisMenu.min.js') }}"></script>
<script src="{{ asset('plugins/perfect-scrollbar/js/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('plugins/edittable/bstable.js') }}"></script>

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
<script src="{{ asset('js/app.js') }}"></script>
