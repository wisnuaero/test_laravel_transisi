<!DOCTYPE html>
<html>

<head>
    <title>Export Data</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>List Data Employee</h4>
        </h5>
    </center>

    <table class='table table-bordered'>
        <thead>
            <tr>
                <th class="attendance-cell">No</th>
                <th class="attendance-cell">Nama</th>
                <th class="attendance-cell">Email</th>
                <th class="attendance-cell">Company</th>
                <th class="attendance-cell">Created At</th>
            </tr>
        </thead>
        <tbody>
            @php $i=1 @endphp
            @foreach ($employees as $data)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->email }}</td>
                    <td>{{ $data->get_company->nama }}</td>
                    <td>{{ date('Y-m-d', strtotime($data->created_at)) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
