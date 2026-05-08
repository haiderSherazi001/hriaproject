<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIA Scholar Submissions Report</title>
    
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f7f6; padding: 20px; }
        .container { max-width: 1400px; margin: 0 auto; background: white; padding: 20px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h1 { color: #333; margin-top: 0; }
    </style>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">
</head>
<body>

<div class="container">
    <div style="margin-bottom: 20px;">
        <a href="/" style="text-decoration: none; background: #7a4f22; color: white; padding: 10px 18px; border-radius: 999px; font-size: 14px; font-weight: bold; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
            &larr; Back to Submit Form
        </a>
    </div>
    <h1>Scholar Talent Network - Submissions</h1>
    
    <table id="submissionsTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>City</th>
                <th>WhatsApp</th>
                <th>Batch</th>
                <th>Status</th>
                <th>Qualification</th>
                <th>Contributions</th>
                <th>Photo</th>
                <th>Submitted On</th>
            </tr>
        </thead>
        <tbody>
            @foreach($submissions as $sub)
            <tr>
                <td>{{ $sub->id }}</td>
                <td>{{ $sub->full_name }}</td>
                <td>{{ $sub->city }}</td>
                <td>{{ $sub->whatsapp }}</td>
                <td>{{ $sub->batch }}</td>
                <td>{{ $sub->status }}</td>
                <td>{{ $sub->qualification }}</td>
                
                <td>
                    @if(is_array($sub->contributions))
                        {{ implode(', ', $sub->contributions) }}
                    @else
                        {{ $sub->contributions }}
                    @endif
                </td>
                
                <td>
                    @if($sub->photo_path)
                        <a href="{{ asset('storage/' . $sub->photo_path) }}" target="_blank">View Photo</a>
                    @else
                        No Photo
                    @endif
                </td>
                
                <td>{{ $sub->created_at->format('M d, Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

<script>
    $(document).ready(function() {
        $('#submissionsTable').DataTable({
            dom: 'Bfrtip',
            buttons: [
                'copy', 'csv', 'excel', 'pdf', 'print'
            ],
            order: [[0, 'desc']],
            pageLength: 25
        });
    });
</script>

</body>
</html>