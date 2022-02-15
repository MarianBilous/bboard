@if(session()->has('success'))
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>

    <script>
        $(function() {
            anim5_noti('{{ session()->get('success') }}');
        });
    </script>
@endif
