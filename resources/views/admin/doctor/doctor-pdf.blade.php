<!DOCTYPE html>
<html>
<head>
    <style>
        table, td, th {
            border: 1px solid #ddd;
            text-align: left;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>

<h2>Our Doctors</h2>

<table>
    <tr>
        <th>ID</th>
        <th>DR. Name</th>
        <th>Speciality</th>
        <th>Phone</th>
        <th>Room NO</th>
        <th>Image</th>
    </tr>
    @if(count($doctors))
        @foreach($doctors as $doctor)
            <tr>
                <td>
                    {{ $doctor->id }}
                </td>

                <td>
                    Dr. {{ $doctor->doctor_name }}
                </td>

                <td>
                    {{ $doctor->speciality_name }}
                </td>

                <td>
                    {{ $doctor->phone }}
                </td>

                <td>
                    {{ $doctor->room_number }}
                </td>

                <td>
                    <img style="width: 70px; height: 70px"
                         src="{{ public_path('admin/images/upload-doctor/'.$doctor->image ) }}"
                         alt="image">
                </td>
            </tr>
        @endforeach
    @else
        <tr>
            <td>Doctor Not Found</td>
        </tr>
    @endif
</table>

</body>
</html>
