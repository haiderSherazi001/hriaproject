<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HRIA Admin Dashboard</title>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.2/css/buttons.dataTables.min.css">

    <style>

/* Add this to your existing styles */
        .filter-bar {
            background: var(--card-bg);
            padding: 20px;
            border-radius: 12px;
            border: 1px solid var(--border);
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            align-items: flex-end;
            flex-wrap: wrap;
        }
        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }
        .filter-group label {
            font-size: 12px;
            font-weight: 600;
            color: var(--text-muted);
            text-transform: uppercase;
        }
        .filter-group select {
            padding: 10px;
            border: 1px solid var(--border);
            border-radius: 8px;
            background: #f9fafb;
            min-width: 180px;
            outline: none;
        }
        .filter-group select:focus {
            border-color: var(--primary);
        }

        :root {
            --primary: #7a4f22;
            --bg: #f9fafb;
            --card-bg: #ffffff;
            --text-main: #111827;
            --text-muted: #6b7280;
            --border: #e5e7eb;
        }

        body { 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif; 
            background-color: var(--bg); 
            color: var(--text-main);
            padding: 30px 20px; 
            margin: 0;
        }

        .container { 
            max-width: 1400px; 
            margin: 0 auto; 
        }

        /* Header & Navigation */
        .header-action {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }

        .action-buttons {
            display: flex;
            gap: 12px;
        }

        .btn-custom {
            text-decoration: none; 
            background: #ffffff; 
            color: var(--text-main); 
            padding: 10px 20px; 
            border-radius: 8px; 
            font-size: 14px; 
            font-weight: 600; 
            border: 1px solid var(--border);
            transition: all 0.2s;
            cursor: pointer;
        }

        .btn-custom:hover {
            background: #f3f4f6;
        }

        .btn-primary-custom {
            background: var(--primary);
            color: #ffffff;
            border-color: var(--primary);
        }

        .btn-primary-custom:hover {
            background: #5f3b17;
        }

        h1 { margin: 0; font-size: 28px; color: var(--text-main); }

        /* Modern Stat Cards */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: var(--card-bg);
            padding: 24px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }

        .stat-title {
            color: var(--text-muted);
            font-size: 14px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            margin-bottom: 8px;
        }

        .stat-value {
            font-size: 36px;
            font-weight: 800;
            color: var(--primary);
            line-height: 1;
        }

        /* Table Container */
        .table-wrapper {
            background: var(--card-bg);
            padding: 24px;
            border-radius: 12px;
            border: 1px solid var(--border);
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
            overflow-x: auto;
        }

        /* DataTables Custom Overrides for Minimal Look */
        table.dataTable.display tbody tr.odd > .sorting_1, table.dataTable.order-column.stripe tbody tr.odd > .sorting_1 { background-color: transparent; }
        table.dataTable.display tbody tr.even > .sorting_1, table.dataTable.order-column.stripe tbody tr.even > .sorting_1 { background-color: transparent; }
        table.dataTable tbody tr { border-bottom: 1px solid var(--border); }
        table.dataTable thead th { border-bottom: 2px solid var(--border); color: var(--text-muted); font-weight: 600; text-transform: uppercase; font-size: 12px; padding-bottom: 12px; }
        .dataTables_wrapper .dataTables_filter input { border: 1px solid var(--border); border-radius: 6px; padding: 8px 12px; margin-left: 8px; outline: none;}
        .dataTables_wrapper .dataTables_filter input:focus { border-color: var(--primary); }
    </style>
</head>
<body>

<div class="container">
    @if(session('success'))
        <div style="background: #ecfdf3; border: 1px solid #b7ebc6; color: #1f7a4f; padding: 14px 20px; border-radius: 8px; font-weight: 600; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="header-action">
        <h1>Overview Dashboard</h1>
        <div class="action-buttons" style="display: flex; align-items: center; gap: 12px;">
            @if(request()->filled('city') || request()->filled('batch') || request()->filled('status'))
                <a href="/admin/report" class="btn-custom" style="color: #b42318; border-color: #fecdca; background: #fef3f2;">&times; Clear Filter</a>
            @endif
            
            <a href="/join" class="btn-custom">View Public Form</a>

            <a href="/admin/change-password" class="btn-custom" style="background: transparent; border-color: #e5e7eb;">🔑 Change Password</a>
            
            <form method="POST" action="{{ route('logout') }}" style="margin: 0;">
                @csrf
                <button type="submit" class="btn-custom" style="background: transparent; color: #b42318; border-color: #e5e7eb; cursor: pointer;">
                    Logout
                </button>
            </form>
        </div>
    </div>

    <form method="GET" action="/admin/report" class="filter-bar">
        <div class="filter-group">
            <label for="city">Filter by City</label>
            <select name="city" id="city">
                <option value="">All Cities</option>
                @foreach($filterOptions['cities'] as $city)
                    <option value="{{ $city }}" {{ request('city') == $city ? 'selected' : '' }}>
                        {{ $city }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-group">
            <label for="batch">Filter by Batch</label>
            <select name="batch" id="batch">
                <option value="">All Batches</option>
                @foreach($filterOptions['batches'] as $batch)
                    <option value="{{ $batch }}" {{ request('batch') == $batch ? 'selected' : '' }}>
                        {{ $batch }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-group">
            <label for="status">Filter by Status</label>
            <select name="status" id="status">
                <option value="">All Statuses</option>
                @foreach($filterOptions['statuses'] as $status)
                    <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                        {{ $status }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="filter-group" style="flex-direction: row; align-items: center; padding-bottom: 2px;">
            <label for="timeframe">Chart View</label>
            <select name="timeframe" id="timeframe">
                <option value="daily" {{ $timeframe == 'daily' ? 'selected' : '' }}>Daily</option>
                <option value="monthly" {{ $timeframe == 'monthly' ? 'selected' : '' }}>Monthly</option>
                <option value="yearly" {{ $timeframe == 'yearly' ? 'selected' : '' }}>Yearly</option>
            </select>
            <button type="submit" class="btn-custom btn-primary-custom" style="padding: 10px 24px;">Apply Filters</button>
            
            @if(request()->filled('city') || request()->filled('batch') || request()->filled('status'))
                <a href="/admin/report" style="color: #b42318; font-size: 14px; font-weight: 600; text-decoration: none; margin-left: 10px;">Clear</a>
            @endif
        </div>
    </form>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-title">Total Submissions</div>
            <div class="stat-value">{{ $stats['total'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Active Students</div>
            <div class="stat-value">{{ $stats['students'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Working Professionals</div>
            <div class="stat-value">{{ $stats['professionals'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Highly Active Volunteers</div>
            <div class="stat-value">{{ $stats['ready_to_contribute'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Top City</div>
            <div class="stat-value" style="font-size: 28px;">{{ $stats['top_city'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Most Popular Contribution</div>
            <div class="stat-value" style="font-size: 24px; line-height: 1.2;">{{ $stats['top_contribution'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Highly Available</div>
            <div class="stat-value">{{ $stats['highly_available'] }}</div>
        </div>
        <div class="stat-card">
            <div class="stat-title">Dominant Batch</div>
            <div class="stat-value" style="font-size: 28px;">{{ $stats['top_batch'] }}</div>
        </div>
    </div>

    <div style="background: var(--card-bg); padding: 24px; border-radius: 12px; border: 1px solid var(--border); margin-bottom: 30px; box-shadow: 0 1px 3px rgba(0,0,0,0.05);">
        <div style="color: var(--text-muted); font-size: 14px; font-weight: 600; text-transform: uppercase; margin-bottom: 16px;">Registration Growth</div>
        <div style="position: relative; height: 300px; width: 100%;">
            <canvas id="growthChart"></canvas>
        </div>
    </div>

    <div class="table-wrapper">
        <table id="submissionsTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Name / Father's Name</th>
                    <th>Photo</th>
                    <th>Contact Info</th>
                    <th>Batch</th>
                    <th>Status / Qual.</th>
                    <th>Contributions</th>
                    <th>Availability</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($submissions as $sub)
                <tr>
                    <td>
                        <strong>{{ $sub->full_name }}</strong><br>
                        <span style="font-size: 12px; color: #6b7280;">S/O, D/O: {{ $sub->father_name }}</span>
                    </td>

                    <td style="text-align: center;">
                        @if($sub->photo_path)
                            <div style="display: flex; flex-direction: column; align-items: center; gap: 6px;">
                                <img src="{{ asset($sub->photo_path) }}" alt="Photo" style="width: 44px; height: 44px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border);">
                                <a href="{{ asset($sub->photo_path) }}" download class="btn-custom" style="padding: 2px 8px; font-size: 10px;">Download</a>
                            </div>
                        @else
                            <span style="font-size: 11px; color: #9ca3af; font-style: italic; padding: 10px;">No Photo</span>
                        @endif
                    </td>
                    
                    <td>
                        <strong>{{ $sub->city }}</strong><br>
                        <span style="font-size: 12px; color: #6b7280;">{{ $sub->address }}</span><br>
                        <span style="font-size: 12px; color: #7a4f22;">{{ $sub->whatsapp }}</span>
                    </td>
                    
                    <td>{{ $sub->batch }}</td>
                    
                    <td>
                        <span style="background: #f3f4f6; padding: 4px 8px; border-radius: 999px; font-size: 12px; font-weight: 600; color: #374151;">
                            {{ $sub->status }}
                        </span><br>
                        <span style="font-size: 12px; color: #6b7280; display: inline-block; margin-top: 6px;">{{ $sub->qualification }}</span>
                    </td>
                    
                    <td style="font-size: 13px;">
                        {{ is_array($sub->contributions) ? implode(', ', $sub->contributions) : $sub->contributions }}
                    </td>
                    
                    <td style="font-size: 13px;">{{ $sub->availability }}</td>
                    
                    <td style="font-size: 13px;">{{ $sub->created_at->format('M d, Y') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    $(document).ready(function() {
        $('#submissionsTable').DataTable({
            dom: '<"top"Bf>rt<"bottom"lip><"clear">', 
            buttons: [
                { extend: 'excel', className: 'btn-custom btn-primary-custom', text: 'Export to Excel' },
                { extend: 'print', className: 'btn-custom', text: 'Print Data' }
            ],
            order: [],
            columnDefs: [
                { targets: 1, orderable: false }
            ],
            pageLength: 25,
            language: { 
                search: "", 
                searchPlaceholder: "Search any field..." 
            }
        });
    });
</script>
<script>
    const labels = {!! json_encode($chartLabels) !!};
    const dataValues = {!! json_encode($chartValues) !!};

    const ctx = document.getElementById('growthChart').getContext('2d');
    
    new Chart(ctx, {
        type: 'line', 
        data: {
            labels: labels,
            datasets: [{
                label: 'Submissions',
                data: dataValues,
                borderColor: '#7a4f22', 
                backgroundColor: 'rgba(122, 79, 34, 0.1)',
                borderWidth: 2,
                pointBackgroundColor: '#fff',
                pointBorderColor: '#7a4f22',
                pointRadius: 4,
                fill: true, 
                tension: 0.3 
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { display: false } 
            },
            scales: {
                y: { 
                    beginAtZero: true,
                    ticks: { precision: 0 } 
                },
                x: {
                    grid: { display: false } 
                }
            }
        }
    });
</script>

</body>
</html>